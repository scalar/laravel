<?php

namespace Scalar\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;

class ScalarController extends Controller
{
    public function __invoke()
    {
        if (! Gate::check('viewScalar') && ! app()->environment('local')) {
            return abort(403);
        }

        return view('scalar::reference');
    }
}
