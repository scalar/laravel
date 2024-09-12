<?php

namespace Scalar;

use Illuminate\Support\Facades\Gate;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ScalarServiceProvider extends PackageServiceProvider
{
    public function boot()
    {
        parent::boot();

        Gate::define('viewScalar', function ($user = null) {
            return true;
        });
    }

    public function configurePackage(Package $package): void
    {
        $package
            ->name('scalar')
            ->hasConfigFile()
            ->hasViews('scalar')
            ->hasRoute('web');

    }
}
