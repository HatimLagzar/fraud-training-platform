<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;

class AskForVerificationController extends Controller
{
    public function __invoke()
    {
        return view('client.verification.ask');
    }
}
