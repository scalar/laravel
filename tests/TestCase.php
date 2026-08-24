<?php

declare(strict_types=1);

namespace Scalar\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Scalar\ScalarServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            ScalarServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('app.key', 'base64:'.base64_encode(random_bytes(32)));
        config()->set('database.default', 'testing');
    }
}
