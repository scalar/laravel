<?php

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Scalar\Controllers\ScalarController;

it('registers the route', function () {
    $routes = Route::getRoutes();
    $route = $routes->getByName('scalar');

    expect($route)->not->toBeNull()
        ->and('/'.$route->uri())->toBe(config('scalar.path'))
        ->and($route->getAction('controller'))->toBe(ScalarController::class);
});

it('returns a view', function () {
    $response = $this->get(config('scalar.path'));

    $response->assertViewIs('scalar::reference');
});

it('contains the OpenAPI document URL', function () {
    $response = $this->get(config('scalar.path'));

    $response->assertOk()
        ->assertSee('Scalar.createApiReference')
        ->assertSee(str_replace('/', '\/', config('scalar.url')));
});

it('contains the jsDelivr URL', function () {
    $response = $this->get(config('scalar.path'));

    $response->assertOk()
        ->assertSee('https:\/\/cdn.jsdelivr.net\/npm\/@scalar\/galaxy\/dist\/latest.json');
});

it('reflects changes in the config', function () {
    // Original config
    $originalCdn = config('scalar.cdn');

    // Modify config
    config()->set('scalar.cdn', 'https://example.com/cdn');

    $response = $this->get('/scalar');

    $response->assertOk()
        ->assertSee('https://example.com/cdn')
        ->assertDontSee($originalCdn);

    // Reset config
    config(['scalar.cdn' => $originalCdn]);
});

it('doesn’t block access in production by default', function () {
    $response = $this->get(config('scalar.path'));

    $response->assertOk();
});

it('can block access in production', function () {
    // Overwrite the viewScalar Gate to block access
    Gate::define('viewScalar', fn ($user = null) => false);

    $response = $this->get(config('scalar.path'));

    $response->assertForbidden();
});
