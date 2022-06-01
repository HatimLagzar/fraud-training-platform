<?php

namespace App\Http\Controllers\Client\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Throwable;

class HomeController extends Controller
{
    public function __invoke()
    {
        try {
            return view('client.dashboard.home');
        } catch (Throwable $e) {
            Log::error('failed to show dashboard home', [
                'error_message' => $e->getMessage(),
                'error_trace'   => $e->getTraceAsString()
            ]);

            return redirect()
                ->route('home')
                ->with('error', 'Error occurred, please retry later.');
        }
    }
}
