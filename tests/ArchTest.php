<?php

use Illuminate\Support\Facades\Facade;

arch('it will not use debugging functions')
    ->expect(['dd', 'ddd', 'dump', 'ray'])
    ->each->not->toBeUsed();

arch('it uses strict types')
    ->expect('Scalar')
    ->toUseStrictTypes();

arch('controllers are invokable and suffixed')
    ->expect('Scalar\Controllers')
    ->toBeInvokable()
    ->toHaveSuffix('Controller');

arch('the facade extends the Laravel facade')
    ->expect('Scalar\Facades\Scalar')
    ->toExtend(Facade::class);

arch('exceptions extend RuntimeException')
    ->expect('Scalar\Exceptions')
    ->toExtend(RuntimeException::class);

arch('the document value object is final')
    ->expect('Scalar\Document')
    ->toBeFinal();

arch()->preset()->php();

arch()->preset()->security();
