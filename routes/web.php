<?php

use Illuminate\Support\Facades\Route;
use Scalar\Controllers\ScalarController;

Route::group([
    'domain' => config('scalar.domain', null),
    'prefix' => config('scalar.path'),
    'middleware' => config('scalar.middleware', 'web'),
], function () {
    Route::get('/', ScalarController::class)->name('scalar');
});
