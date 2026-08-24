# Changelog

All notable changes to `scalar/laravel` will be documented in this file.

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
