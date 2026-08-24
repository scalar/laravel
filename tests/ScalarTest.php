<?php

use Illuminate\Auth\GenericUser;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Scalar\Controllers\ScalarController;
use Scalar\Exceptions\MissingOpenApiDocument;
use Scalar\Scalar;

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

it('renders configuration options as JSON', function () {
    $response = $this->get(config('scalar.path'));

    $response->assertOk()
        // defaultHttpClient uses the `targetKey` key expected by Scalar
        ->assertSee('"targetKey":"shell"', false)
        // the download button is controlled via documentDownloadType
        ->assertSee('"documentDownloadType":"both"', false);
});

it('reflects configuration changes in the rendered JSON', function () {
    config()->set('scalar.configuration.showOperationId', true);

    $response = $this->get(config('scalar.path'));

    $response->assertOk()
        ->assertSee('"showOperationId":true', false);
});

it('bypasses the authorization gate in the local environment', function () {
    // Even a denying gate must not block access when running locally.
    Gate::define('viewScalar', fn ($user = null) => false);
    app()['env'] = 'local';

    $response = $this->get(config('scalar.path'));

    $response->assertOk();
});

it('passes the authenticated user to the authorization gate', function () {
    Gate::define('viewScalar', fn ($user = null) => $user?->email === 'allowed@example.com');

    $this->actingAs(new GenericUser(['email' => 'allowed@example.com']))
        ->get(config('scalar.path'))
        ->assertOk();

    $this->actingAs(new GenericUser(['email' => 'denied@example.com']))
        ->get(config('scalar.path'))
        ->assertForbidden();
});

it('registers the route with the configured middleware', function () {
    $route = Route::getRoutes()->getByName('scalar');

    expect($route->gatherMiddleware())->toContain(...config('scalar.middleware'));
});

it('builds the page title from the app name by default', function () {
    config()->set('app.name', 'Acme');
    config()->set('scalar.configuration.metaData.title', null);

    expect(Scalar::pageTitle())->toBe('Acme API Reference');
});

it('uses the configured meta title when set', function () {
    config()->set('scalar.configuration.metaData.title', 'Custom Docs');

    expect(Scalar::pageTitle())->toBe('Custom Docs');
});

it('maps the laravel theme to none and adds the integration identifier', function () {
    config()->set('scalar.configuration.theme', 'laravel');

    $configuration = Scalar::configuration();

    expect($configuration['theme'])->toBe('none')
        ->and($configuration['_integration'])->toBe('laravel');
});

it('keeps a non-laravel theme unchanged', function () {
    config()->set('scalar.configuration.theme', 'moon');

    expect(Scalar::configuration()['theme'])->toBe('moon');
});

it('preserves a custom integration identifier when one is set', function () {
    config()->set('scalar.configuration._integration', 'custom');

    expect(Scalar::configuration()['_integration'])->toBe('custom');
});

it('publishes the config file via the install command', function () {
    $this->artisan('scalar:install')
        ->expectsConfirmation('Would you like to star our repo on GitHub?', 'no')
        ->expectsOutputToContain('Point Scalar at your OpenAPI document')
        ->assertExitCode(0);
});

it('embeds raw content and drops the url when content is set', function () {
    config()->set('scalar.content', '{"openapi":"3.1.0"}');

    $configuration = Scalar::configuration();

    expect($configuration['content'])->toBe('{"openapi":"3.1.0"}')
        ->and($configuration->has('url'))->toBeFalse();
});

it('embeds a local file as content, taking precedence over content and url', function () {
    config()->set('scalar.file', __DIR__.'/Fixtures/openapi.json');
    config()->set('scalar.content', '{"openapi":"3.1.0"}');

    $configuration = Scalar::configuration();

    expect($configuration['content'])->toContain('Fixture API')
        ->and($configuration->has('url'))->toBeFalse();
});

it('throws when the configured file does not exist', function () {
    config()->set('scalar.file', __DIR__.'/Fixtures/does-not-exist.json');

    Scalar::configuration();
})->throws(MissingOpenApiDocument::class);

it('throws when no OpenAPI document is configured', function () {
    config()->set('scalar.url', null);
    config()->set('scalar.content', null);
    config()->set('scalar.file', null);

    Scalar::configuration();
})->throws(MissingOpenApiDocument::class);

it('renders inline content through the reference view', function () {
    config()->set('scalar.content', '{"openapi":"3.1.0","info":{"title":"Inline"}}');

    $this->get(config('scalar.path'))
        ->assertOk()
        ->assertSee('"content":', false);
});
