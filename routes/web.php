<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'domain' => config('scalar.domain', null),
    'prefix' => config('scalar.path'),
    'middleware' => config('scalar.middleware', 'web'),
], function () {
    Route::view('/', 'scalar::reference');
});
