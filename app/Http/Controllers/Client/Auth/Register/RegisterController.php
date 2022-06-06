<?php

namespace App\Http\Controllers\Client\Auth\Register;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Services\Domain\Auth\Exceptions\EmailAlreadyInUseException;
use App\Services\Domain\Auth\RegisterService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Throwable;

class RegisterController extends Controller
{
    private RegisterService $registerService;

    public function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }

    public function __invoke(RegisterRequest $request): RedirectResponse
    {
        try {
            $user = $this->registerService->register(
                $request->get('name'),
                $request->get('email'),
                $request->get('password'),
                $request->get('country'),
            );

            Auth::login($user);

            return redirect()
                ->route('dashboard.subscribe.show')
                ->with('success', 'Account created successfully!');
        } catch (EmailAlreadyInUseException $e) {
            return redirect()
                ->route('register-page')
                ->with('error', 'Email already in use!');
        } catch (Throwable $e) {
            Log::error('failed to register', [
                'error_message' => $e->getMessage(),
                'error_trace'   => $e->getTraceAsString()
            ]);

            return redirect()
                ->route('register-page')
                ->with('error', 'Error occurred, please retry later!');
        }
    }
}
