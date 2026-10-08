#!/bin/sh
set -eu

# ---------------------------------------------------------------------------
# Container entrypoint.
#
# The web container (the image's default command) waits for the database and
# applies migrations before nginx/php-fpm start. The SSR container runs this
# same image with its command overridden (`node bootstrap/ssr/ssr.js`); it has
# no database dependency, so the bootstrap work only runs for the default
# supervisord command.
#
#   RUN_MIGRATIONS=false   disable the migration step entirely
#   DB_WAIT_TIMEOUT=60     seconds to wait for the database to accept a TCP
#                          connection before giving up (0 disables the wait)
# ---------------------------------------------------------------------------

DB_WAIT_TIMEOUT="${DB_WAIT_TIMEOUT:-60}"
DB_PORT="${DB_PORT:-3306}"
DB_HOST="${DB_HOST:-}"
RUN_MIGRATIONS="${RUN_MIGRATIONS:-true}"

log() {
    printf '[entrypoint] %s\n' "${1}"
}

wait_for_database() {
    [ "${DB_WAIT_TIMEOUT}" -gt 0 ] || return 0
    [ -n "${DB_HOST}" ] || return 0

    # A leading slash means DB_HOST is a unix socket path, not TCP.
    case "${DB_HOST}" in
        /*) return 0 ;;
    esac

    log "waiting for database at ${DB_HOST}:${DB_PORT} (timeout ${DB_WAIT_TIMEOUT}s)"

    elapsed=0
    while ! php -r '
        $host = getenv("DB_HOST");
        $port = (int) (getenv("DB_PORT") ?: 3306);
        $socket = @fsockopen($host, $port, $errno, $errstr, 2);
        exit($socket === false ? 1 : 0);
    ' 2>/dev/null; do
        if [ "${elapsed}" -ge "${DB_WAIT_TIMEOUT}" ]; then
            log "database did not become reachable within ${DB_WAIT_TIMEOUT}s"
            return 1
        fi
        elapsed=$((elapsed + 2))
        sleep 2
    done

    log "database is reachable"
}

bootstrap_database() {
    [ "${RUN_MIGRATIONS}" = "true" ] || return 0

    wait_for_database

    log "running migrations"
    php artisan migrate --force --no-interaction

    # Migrations run as root; keep storage/cache writable by php-fpm.
    chown -R www-data:www-data storage bootstrap/cache
}

if [ "${1:-}" = "/usr/bin/supervisord" ]; then
    bootstrap_database
fi

exec "${@}"
