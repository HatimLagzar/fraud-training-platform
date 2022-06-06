<?php

namespace App\Http\Controllers\Client\Subscribe;

use App\Http\Controllers\Controller;

class ShowSuccessPageController extends Controller
{
    public function __invoke()
    {
        return view('client.subscribe.success');
    }
}
