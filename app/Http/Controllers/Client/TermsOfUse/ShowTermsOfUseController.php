<?php

namespace App\Http\Controllers\Client\TermsOfUse;

use App\Http\Controllers\Controller;

class ShowTermsOfUseController extends Controller
{
    public function __invoke()
    {
        return view('terms-of-use');
    }
}