<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Throwable;

class HomeController extends Controller
{
    public function __invoke()
    {
        try {
            return view('home');
        } catch (Throwable $e) {
            Log::error('failed to show home page', [
                'error_message' => $e->getMessage()
            ]);

            return 'Error occurred, please retry later!';
        }
    }
}
