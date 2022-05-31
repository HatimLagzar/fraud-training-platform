<?php

namespace App\Http\Controllers\Client\Auth\Register;

use App\Http\Controllers\Controller;
use App\Services\Core\Country\CountryService;
use Illuminate\Support\Facades\Log;
use Throwable;

class ShowRegisterPageController extends Controller
{
    private CountryService $countryService;

    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }

    public function __invoke()
    {
        try {
            $countries = $this->countryService->getAll();

            return view('client.auth.register')
                ->with('countries', $countries);
        } catch (Throwable $e) {
            Log::error('failed to show register page', [
                'error_message' => $e->getMessage()
            ]);

            return redirect()
                ->route('home')
                ->with('error', 'Error occurred, please retry later!');
        }
    }
}
