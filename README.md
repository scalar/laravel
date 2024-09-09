# Scalar for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/scalar/laravel.svg?style=flat-square)](https://packagist.org/packages/scalar/laravel)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/scalar/laravel/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/scalar/laravel/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/scalar/laravel/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/scalar/laravel/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/scalar/laravel.svg?style=flat-square)](https://packagist.org/packages/scalar/laravel)

Render your OpenAPI-based API reference in Laravel

## Installation

You can install the package via composer:

```bash
composer require scalar/laravel
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="scalar-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="scalar-views"
```

## Usage

You’ll need an OpenAPI/Swagger document to render your API reference with Scalar, here are two packages that help generating those documents:

* [knuckleswtf/scribe](https://github.com/knuckleswtf/scribe)
* [dedoc/scramble](https://github.com/dedoc/scramble)
* [vyuldashev/laravel-openapi](https://github.com/vyuldashev/laravel-openapi)

Once done, you can pass it to Scalar:

```php
<?php

// config/scalar.php

return [
    'url' => '/openapi.yaml',
]
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Contributions are welcome.

## Credits

- [Hans Pagel](https://github.com/hanspagel)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
