# Scalar for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/scalar/laravel.svg?style=flat)](https://packagist.org/packages/scalar/laravel)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/scalar/laravel/run-tests.yml?branch=main&label=tests&style=flat)](https://github.com/scalar/laravel/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/scalar/laravel/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat)](https://github.com/scalar/laravel/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/scalar/laravel.svg?style=flat)](https://packagist.org/packages/scalar/laravel)

Use your OpenAPI documents to render modern API references in Laravel

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

You’ll need an OpenAPI/Swagger document to render your API reference with Scalar. Here are some packages that help generating those documents:

* [knuckleswtf/scribe](https://github.com/knuckleswtf/scribe)
* [dedoc/scramble](https://github.com/dedoc/scramble)
* [vyuldashev/laravel-openapi](https://github.com/vyuldashev/laravel-openapi)

Once done, you can pass it to Scalar. Just make sure it’s a publicly accessible URL.

```php
<?php

// config/scalar.php

return [
    // …

    'url' => '/openapi.yaml',

    // …
]
```

## Authorization

The Scalar API reference may be accessed via the /scalar route. By default, everyone will be able to access this route. However, within your App\Providers\AppServiceProvider.php file, you can overwrite the gate definition. This authorization gate controls access to Scalar in non-local environments. You are free to modify this gate as needed to restrict access to your Horizon installation:

```php
<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Gate::define('viewScalar', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }
}
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
