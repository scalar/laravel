<?php

namespace Scalar;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ScalarServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('scalar')
            ->hasConfigFile()
            ->hasViews('scalar')
            ->hasRoute('web');

    }
}
