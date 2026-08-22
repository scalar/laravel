<?php

namespace Scalar\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;

class ScalarController extends Controller
{
    public function __invoke()
    {
        if (! app()->environment('local')) {
            abort_unless(Gate::check('viewScalar'), 403);
        }

        return view('scalar::reference');
    }
}
