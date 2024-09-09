<?php

namespace Scalar\Scalar;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Scalar\Scalar\Commands\ScalarCommand;

class ScalarServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-scalar')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel_scalar_table')
            ->hasCommand(ScalarCommand::class);
    }
}
