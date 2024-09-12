<?php

namespace Scalar\Controllers;

use Illuminate\Routing\Controller;

class ScalarController extends Controller
{
    public function __invoke()
    {
        return view('scalar::reference');
    }
}
