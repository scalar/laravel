<?php

namespace Scalar\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Scalar\Scalar
 */
class Scalar extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Scalar\Scalar::class;
    }
}
