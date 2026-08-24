<?php

use Illuminate\Support\Facades\Facade;

arch('it will not use debugging functions')
    ->expect(['dd', 'ddd', 'dump', 'ray', 'var_dump', 'die', 'phpinfo'])
    ->each->not->toBeUsed();

arch('it will not use insecure functions')
    ->expect(['eval', 'exec', 'shell_exec', 'system', 'passthru', 'md5', 'sha1', 'unserialize', 'extract'])
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
