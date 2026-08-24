<?php

declare(strict_types=1);

namespace Scalar;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Gate;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ScalarServiceProvider extends PackageServiceProvider
{
    public function boot(): void
    {
        parent::boot();

        Gate::define('viewScalar', fn (?Authenticatable $user = null): bool => true);
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
