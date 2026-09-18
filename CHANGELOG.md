# Changelog

All notable changes to `scalar/laravel` will be documented in this file.

## 0.4.1 - 2026-09-18

### Fixes

* Respect the selected OpenAPI document input by ignoring `url`, `content`, `file`, and `sources` inside `configuration`. Use the top-level document settings or `Scalar::document()` to select documents. (#31)
* Safely encode configuration embedded in the reference page with script-safe JSON escaping. (#31)

### Documentation

* Clarify document configuration, JSON serialization, document access rules, and how to pin or self-host the Scalar client. (#31)

### Internal

* Add regression tests and pull request checks. (#31)
* Pin all GitHub Actions to full commit hashes. (#32)

**Full Changelog**: https://github.com/scalar/laravel/compare/0.4.0...0.4.1

## 0.4.0 - 2026-08-24

### Breaking changes

* Drops Laravel 10 support. The package now requires Laravel 11, 12, or 13 (and Pest 3+ for development).
* The default configuration gained `content`, `file`, and `sources` options. Please re-publish the config file: `php artisan vendor:publish --tag="scalar-config"`.

### Features

* Added a `php artisan scalar:install` command that publishes the config and finishes setup.
* Render a local OpenAPI document without hosting it anywhere, via the new `content` (inline) and `file` (local path) options.
* Render multiple or versioned documents behind a document switcher, via the `sources` config array or the `Scalar::document()` registrar.
* Scalar now throws a clear `MissingOpenApiDocument` exception when no OpenAPI document is configured (instead of rendering an empty reference).

### Internal

* Hardened the package with static analysis (PHPStan + Larastan), 100% type and mutation coverage, and expanded architecture tests.

## 0.3.0 - 2026-08-24

### Breaking change

* Updates the default configuration. Please re-publish the config file: `php artisan vendor:publish --tag="scalar-config"`.

### Features

* Refreshed the config with current Scalar options: `documentDownloadType`, `showOperationId`, `hideClientButton`, `expandAllModelSections`, `expandAllResponses`, `expandAllSchemaProperties`, `modelsSectionLabel`, `operationTitleSource`, `orderRequiredPropertiesFirst`, `orderSchemaPropertiesBy`, `operationsSorter`, `persistAuth`, `telemetry`, `showDeveloperTools`, and the `laserwave` theme.
* Tested against PHP 8.4 and 8.5.
* Support for Pest 5 and Testbench 11 (dev dependencies).

### Fixes

* Fixed the default HTTP client selection (`targetId` → `targetKey`).
* Replaced the removed `hideDownloadButton` option with `documentDownloadType`.
* Made the authorization gate example in the README null-safe for guests.

## Laravel 12 compatibility, new JS API, update configuration - 2025-03-24

Long overdue release:

### Breaking change

* Updates the default configuration (please re-publish the configuration file)

### Features

* Makes the package compatible with Laravel 10, 11 *and* 12.
* Uses the new Scalar JS API
