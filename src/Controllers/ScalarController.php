<?php

declare(strict_types=1);

namespace Scalar\Controllers;

use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;

class ScalarController extends Controller
{
    public function __invoke(): ViewContract
    {
        if (! app()->environment('local')) {
            abort_unless(Gate::check('viewScalar'), 403);
        }

        return View::make('scalar::reference');
    }
}
