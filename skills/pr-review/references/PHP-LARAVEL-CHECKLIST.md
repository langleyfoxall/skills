# PHP and Laravel Checklist

Use this when PHP files, Composer configuration, Laravel project structure, `artisan`, or Laravel packages are present. Do not assume Laravel solely because PHP exists.

## PHP Style and Tooling

- Check PSR-12 compliance for PHP code.
- Prefer project tools such as Laravel Pint, PHP_CodeSniffer, PHP-CS-Fixer, PHPStan, Psalm, PHPUnit, or Pest when present.
- Treat repo configuration as authoritative over generic style opinions.
- Report clear formatting or consistency violations as `P3` unless they reveal broader tooling risk.

## Laravel Review Areas

- Controllers, actions, jobs, listeners, policies, middleware, form requests, resources, models, migrations, service providers, routes, config, queues, events, notifications, and Blade/Inertia/API output.
- Authorization in controllers, policies, gates, middleware, jobs, commands, and queued/background paths.
- Validation boundaries, request classes, custom rules, nullable handling, enum consistency, and authorization inside form requests.
- Eloquent query behavior, scopes, eager loading, N+1 risk, soft deletes, global scopes, transactions, and race conditions.
- Mass assignment through `fillable`, `guarded`, `create`, `update`, `forceFill`, DTOs, and request payload mapping.
- Casts, accessors, mutators, date/time handling, serialization, hidden/visible attributes, and API resource output.
- Migrations, rollback safety, defaults, indexes, foreign keys, nullable changes, data backfills, and deploy ordering.
- Queues, retries, idempotency, timeouts, uniqueness, event/listener side effects, notifications, and mailables.
- Config, env variables, config cache, route cache, service provider registration, and package auto-discovery.
- Blade escaping, route model binding, signed URLs, CSRF, redirects, file uploads, storage disks, and authorization of downloads.

## Laravel Tests

- Prefer tests around authorization, validation, persistence, API responses, jobs/events, migrations, and important user flows.
- For changed policies or ownership checks, look for positive and negative authorization tests.
- For migrations, check rollback coverage only when the project convention supports it or the migration is risky.

## Laravel Web Verification

Use official Laravel docs or package docs when code uses an unfamiliar helper, facade, method, validation rule, relationship feature, queue option, or package API and local code does not establish expected behavior.
