## Purpose
This file tells AI coding agents how this repository is structured and how to make small, correct changes quickly.

## Big picture
- Backend: Laravel (PHP 8.2+, `laravel/framework` in `composer.json`). Main backend code lives under `app/` (controllers, middleware, models).
- Frontend: Inertia + Vue 3 under `resources/js/` with Vite (`vite.config.js`) and Tailwind (`tailwind.config.js`).
- Auth & UX: Jetstream + Fortify are used — see `app/Actions/Fortify`, `app/Actions/Jetstream` and service providers in `app/Providers`.
- Data: DB migrations live in `database/migrations`; seeding in `database/seeders`. The project may use `database/database.sqlite` by default (see `composer.json` post-create hooks).

## Key files to inspect when making changes
- Routes: [routes/web.php](routes/web.php) and [routes/api.php](routes/api.php)
- Controllers: [app/Http/Controllers](app/Http/Controllers)
- Models: [app/Models](app/Models) (notably `app/Models/User.php`)
- Frontend pages/components: [resources/js/Pages](resources/js/Pages), [resources/js/Components](resources/js/Components)
- Tests: [tests](tests) (Pest: configured via `pestphp/pest` in `composer.json`)
- Build/config: [composer.json](composer.json), [package.json](package.json), [vite.config.js](vite.config.js)

## Developer workflows (how to run/build/test)
- Install & bootstrap: `composer install && npm install` or use `composer run setup` which runs the repository setup script.
- Full dev stack (backend+vite+workers): `composer run dev` (this runs `php artisan serve`, queues, pail, and `npm run dev` via `concurrently`).
- Frontend only: `npm run dev` (or `npm run build` for production assets).
- Tests: `composer run test` or `./vendor/bin/pest` / `php artisan test` (Pest is configured; see `phpunit.xml` and `composer.json`).
- Debugging: project includes DDEV tasks for Xdebug. Use `ddev xdebug on` / `ddev xdebug off` when running in DDEV.

## Project-specific conventions & patterns
- Inertia controllers typically return Inertia responses. Example pattern in controllers:

  Inertia::render('Pages/SomePage', ['data' => $value]);

- Authentication customization is implemented via actions in `app/Actions/Fortify` and `app/Actions/Jetstream`. Prefer adding logic there for auth-related changes.
- Frontend uses a component/page per Inertia route under `resources/js/Pages` and shared UI under `resources/js/Components`.
- Use PSR-4 `App\\` namespace for PHP classes. Tests use `Tests\\` namespace per `composer.json` autoload-dev.

## Integration points & external deps to be careful with
- Jetstream/Fortify: altering auth flows often requires updating providers in `app/Providers/FortifyServiceProvider.php` and `JetstreamServiceProvider.php`.
- Vite/Tailwind: changing asset paths may require updating `vite.config.js` and `resources/js/` imports.
- Ziggy (`tightenco/ziggy`) is used to expose Laravel routes to the frontend — update `routes` carefully when relying on Ziggy route helpers.

## Making a typical change (example checklist)
1. Add route in [routes/web.php](routes/web.php).
2. Create controller in [app/Http/Controllers](app/Http/Controllers) and return an Inertia response.
3. Add page under [resources/js/Pages](resources/js/Pages) (Vue 3 SFC).
4. Run `npm run dev` and `composer run dev` to verify local behavior.
5. Add a Pest test under [tests/Feature](tests/Feature) and run `composer run test`.

## Tests & CI hints
- Use `composer run test` locally; CI is expected to run `php artisan test`/Pest.
- Avoid modifying global config files (`config/*.php`) without checking for environment-specific fallbacks in `bootstrap/app.php`.

## When to ask for human review
- Schema or migration changes that affect production data.
- Auth or permission changes (Jetstream/Fortify providers).
- Any change touching external integrations (mail, payment, OAuth) declared in `config/services.php`.

## Where to look for more context
- App entrypoints: [routes/web.php](routes/web.php), [app/Providers/AppServiceProvider.php](app/Providers/AppServiceProvider.php)
- Frontend bootstrap: [resources/js/bootstrap.js](resources/js/bootstrap.js) and [resources/js/app.js](resources/js/app.js)

---
If anything here is unclear or you'd like more examples (controller → Inertia → Vue page → test), tell me which area to expand and I will iterate.
