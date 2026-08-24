# AGENTS.md

This file provides guidance to Coding Agents when working with code in this repository.

## What this is

`scalar/laravel` is a **Laravel package** (not an application) that renders modern API references from an OpenAPI document. It exposes a single route (`/scalar` by default) that serves an HTML page loading the Scalar API reference from a CDN, configured entirely through `config/scalar.php`.

The package is built on [spatie/laravel-package-tools](https://github.com/spatie/laravel-package-tools) and is tested against Laravel 11–13 / PHP 8.2–8.5 using [Orchestra Testbench](https://github.com/orchestral/testbench).

## Commands

```bash
composer test              # run the Pest test suite
vendor/bin/pest --filter="registers the route"   # run a single test by description
composer test-coverage     # run tests with coverage
composer format            # apply Laravel Pint code style fixes
composer analyse           # run PHPStan static analysis
composer build             # discover the package + build the workbench app
composer start             # build + serve the workbench app (a real Laravel app for manual testing)
```

There is no separate lint step — `composer format` (Pint) is the code style tool, enforced in CI. Tests run on both Ubuntu and Windows across the full Laravel/PHP matrix; keep changes portable.

## Architecture

The request flow is small and worth understanding end-to-end:

1. **`src/ScalarServiceProvider.php`** — registers the config file, views (`scalar::` namespace), and `routes/web.php` via `configurePackage()`. Its `boot()` defines the `viewScalar` authorization gate, defaulting to `true` (open access).

2. **`routes/web.php`** — registers one route inside a group whose `domain`, `prefix` (path), and `middleware` all come from config. The route name is `scalar`.

3. **`src/Controllers/ScalarController.php`** — a single invokable controller. It enforces the `viewScalar` gate **only outside the `local` environment** (local always has access), then returns the `scalar::reference` view.

4. **`resources/views/reference.blade.php`** + **`layout.blade.php`** — the reference view injects the CDN `<script>` and calls `Scalar.createApiReference()` with the JSON config. The layout ships inline CSS variables for the custom `laravel` theme.

5. **`src/Scalar.php`** — a static helper (fronted by the `Scalar\Facades\Scalar` facade) that the Blade views call to resolve `pageTitle()`, `url()`, `cdn()`, and `configuration()`. Two behaviors to know: when the theme is `'laravel'` it passes `theme => 'none'` to Scalar (the theme is applied via the layout's CSS instead), and it injects `_integration => 'laravel'` into the config.

**Config is the primary API.** Almost all behavior (path, domain, middleware, OpenAPI document `url`, `cdn`, and the nested `configuration` array of Scalar options) is driven by `config/scalar.php`. Consumers override it by publishing the config or setting values at runtime — tests exercise both. When adding a feature, prefer surfacing it through config over hardcoding.

**Authorization:** consuming apps customize access by redefining the `viewScalar` gate in their own `AppServiceProvider` (see README). Do not add auth logic to the controller beyond the existing gate check.

## Testing notes

- Tests use **Pest** with `Scalar\Tests\TestCase` (extends Testbench's `TestCase`), wired up in `tests/Pest.php` for all files under `tests/`.
- `tests/ArchTest.php` asserts `dd`, `dump`, and `ray` are never used in the codebase — don't leave debugging calls behind.
- The `workbench/` directory is a minimal Laravel app used by Testbench for building/serving locally; it is not the package itself.
