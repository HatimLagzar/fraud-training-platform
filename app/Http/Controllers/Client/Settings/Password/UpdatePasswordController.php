<?php

namespace App\Http\Controllers\Client\Settings\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\User;
use App\Services\Core\User\UserService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Throwable;

class UpdatePasswordController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function __invoke(UpdatePasswordRequest $request)
    {
        try {
            /** @var User $user */
            $user = auth()->user();

            if (Hash::check($request->get('current_password'), $user->getAuthPassword()) === false) {
                return redirect()
                    ->route('dashboard.settings.index')
                    ->with('error', __('Incorrect password!'));
            }

            $this->userService->update($user, [
                User::PASSWORD_COLUMN => Hash::make($request->get('new_password'))
            ]);

            return redirect()
                ->route('dashboard.settings.index')
                ->with('success', __('Password updated successfully.'));
        } catch (Throwable $e) {
            Log::error('failed to update password', [
                'error_message' => $e->getMessage(),
                'error_trace'   => $e->getTraceAsString()
            ]);

            return redirect()
                ->route('dashboard.settings.index')
                ->with('error', __('Error occurred, please retry later!'));
        }
    }
}