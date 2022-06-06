<?php

namespace App\Http\Controllers\Client\Settings;

use App\Http\Controllers\Controller;
use App\Models\User;

class ShowSettingsPageController extends Controller
{
    public function __invoke()
    {
        /** @var User $user */
        $user = auth()->guard('web')->user();

        return view('client.settings.index')
            ->with('user', $user);
    }
}