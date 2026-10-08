# syntax=docker/dockerfile:1

# ---------------------------------------------------------------------------
# Production image for the Laravel 13 + Inertia/Vue application.
#
# Three stages:
#   vendor  composer install --no-dev (PHP dependencies)
#   assets  npm ci + `npm run build`, which emits the client bundle
#           (public/build) *and* the SSR bundle (bootstrap/ssr)
#   app     php-fpm + nginx + a Node runtime
#
# Node ships in the final image because the Inertia SSR renderer runs from a
# second container built from this same image, overriding the command with
# `node bootstrap/ssr/ssr.js`.
#
# No secrets and no .env are copied in: every credential is supplied at run
# time (APP_KEY, DB_*, SPACES_*, STRIPE_*, GOOGLE_*, MAIL_*, INERTIA_SSR_URL).
#
# The web container applies database migrations on boot (see
# docker-entrypoint.sh); the SSR container reuses the image but skips them.
# ---------------------------------------------------------------------------

# ------------------------------- vendor ------------------------------------
FROM php:8.4-fpm-bookworm AS vendor

ENV COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_NO_INTERACTION=1

RUN apt-get update \
    && apt-get install -y --no-install-recommends git unzip libzip-dev \
    && docker-php-ext-install -j"$(nproc)" zip \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Manifests only, so the dependency layer stays cached until they change.
COPY composer.json composer.lock ./

# `--no-scripts` skips post-autoload-dump (artisan package:discover), which
# needs the application source. It is run in the app stage instead.
RUN composer install \
        --no-dev \
        --no-interaction \
        --no-progress \
        --no-scripts \
        --prefer-dist \
        --optimize-autoloader

# ------------------------------- assets ------------------------------------
FROM node:24-bookworm-slim AS assets

WORKDIR /app

COPY package.json package-lock.json ./

RUN npm ci --no-audit --no-fund

# The front-end entry points import Ziggy straight out of vendor/ (see
# resources/js/app.js and resources/js/ssr.js), so the PHP dependencies have
# to be in place before the bundles are built.
COPY --from=vendor /app/vendor ./vendor

COPY . .

# Runs `vite build && vite build --ssr` (see package.json), producing both
# public/build (client) and bootstrap/ssr (Node SSR renderer).
RUN npm run build

# --------------------------------- app -------------------------------------
FROM php:8.4-fpm-bookworm AS app

ENV APP_ENV=production \
    APP_DEBUG=false \
    LOG_CHANNEL=stderr \
    NODE_ENV=production

# OPcache is already compiled into the base image, so it only needs tuning.
# pdo_mysql is not covered by composer's platform requirements; pcntl lets the
# queue worker and scheduler shut down gracefully; zip backs archive handling.
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        ca-certificates \
        curl \
        libstdc++6 \
        libzip-dev \
        nginx \
        supervisor \
    && docker-php-ext-install -j"$(nproc)" pdo_mysql pcntl zip \
    && rm -rf /var/lib/apt/lists/* \
    && rm -f /etc/nginx/sites-enabled/default

# The Node runtime is needed to serve the SSR renderer from the second
# container; libstdc++6 above satisfies its shared library dependencies.
COPY --from=assets /usr/local/bin/node /usr/local/bin/node

RUN { \
        echo 'expose_php = Off'; \
        echo 'memory_limit = 256M'; \
        echo 'max_execution_time = 60'; \
        echo 'post_max_size = 100M'; \
        echo 'upload_max_filesize = 100M'; \
        echo 'opcache.enable = 1'; \
        echo 'opcache.enable_cli = 0'; \
        echo 'opcache.memory_consumption = 256'; \
        echo 'opcache.interned_strings_buffer = 32'; \
        echo 'opcache.max_accelerated_files = 20000'; \
        echo 'opcache.validate_timestamps = 0'; \
        echo 'opcache.save_comments = 1'; \
    } > /usr/local/etc/php/conf.d/zz-app.ini

RUN <<'SH'
set -eu

cat > /etc/nginx/conf.d/default.conf <<'NGINX'
server {
    listen 80;
    listen [::]:80;
    server_name _;

    root /var/www/html/public;
    index index.php;

    charset utf-8;
    client_max_body_size 100m;

    access_log /dev/stdout;
    error_log /dev/stderr warn;

    add_header X-Content-Type-Options "nosniff";
    add_header X-Frame-Options "SAMEORIGIN";

    gzip on;
    gzip_types text/plain text/css text/javascript application/javascript application/json image/svg+xml;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ ^/index\.php(/|$) {
        fastcgi_pass 127.0.0.1:9000;
        fastcgi_split_path_info ^(.+\.php)(/.*)$;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        fastcgi_param DOCUMENT_ROOT $realpath_root;
        fastcgi_param PATH_INFO $fastcgi_path_info;
        fastcgi_hide_header X-Powered-By;
        fastcgi_read_timeout 120s;
    }

    location ~ \.php$ {
        return 404;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
NGINX

cat > /etc/supervisor/supervisord.conf <<'SUPERVISOR'
[supervisord]
nodaemon=true
user=root
pidfile=/var/run/supervisord.pid
logfile=/dev/null
logfile_maxbytes=0

[program:php-fpm]
command=/usr/local/sbin/php-fpm --nodaemonize
autostart=true
autorestart=true
priority=5
stdout_logfile=/dev/stdout
stdout_logfile_maxbytes=0
stderr_logfile=/dev/stderr
stderr_logfile_maxbytes=0

[program:nginx]
command=/usr/sbin/nginx -g "daemon off;"
autostart=true
autorestart=true
priority=10
stdout_logfile=/dev/stdout
stdout_logfile_maxbytes=0
stderr_logfile=/dev/stderr
stderr_logfile_maxbytes=0
SUPERVISOR
SH

WORKDIR /var/www/html

COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh

COPY . .

COPY --from=vendor /app/vendor ./vendor
COPY --from=assets /app/public/build ./public/build
COPY --from=assets /app/bootstrap/ssr ./bootstrap/ssr
COPY --from=assets /app/node_modules ./node_modules

# Ownership is normalised to www-data and the modes of the application's own
# files are reset: the working copy contains 0600 files, which php-fpm (running
# as www-data) would be unable to read. `chmod` is scoped to the application
# directories so the executable bits under vendor/bin are left alone.
RUN php artisan package:discover --ansi \
    && mkdir -p \
        storage/framework/cache/data \
        storage/framework/sessions \
        storage/framework/views \
        storage/logs \
    && chown -R www-data:www-data /var/www/html \
    && find app bootstrap config database public resources routes -type d -exec chmod 755 {} + \
    && find app bootstrap config database public resources routes -type f -exec chmod 644 {} + \
    && chmod 755 artisan /usr/local/bin/docker-entrypoint.sh \
    && chmod -R ug+rwX storage bootstrap/cache

# 80: nginx. 13714: the Inertia SSR renderer, used when this image's command is
# overridden with `node bootstrap/ssr/ssr.js`.
EXPOSE 80 13714

HEALTHCHECK --interval=30s --timeout=5s --start-period=20s --retries=3 \
    CMD curl -fsS http://127.0.0.1/up || exit 1

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/supervisord.conf"]
