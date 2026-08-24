<?php

declare(strict_types=1);

namespace Scalar\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string pageTitle()
 * @method static string|null url()
 * @method static string|null content()
 * @method static string cdn()
 * @method static \Illuminate\Support\Collection<array-key, mixed> configuration()
 *
 * @see \Scalar\Scalar
 */
class Scalar extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Scalar\Scalar::class;
    }
}
