<?php

declare(strict_types=1);

namespace Scalar\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;

class ScalarController extends Controller
{
    public function __invoke(): View
    {
        if (! app()->environment('local')) {
            abort_unless(Gate::check('viewScalar'), 403);
        }

        return view('scalar::reference');
    }
}
