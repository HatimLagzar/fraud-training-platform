<?php

namespace App\Http\Controllers\Admin\Subscription;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Core\User\UserService;
use App\Services\Domain\Subscription\CancelSubscriptionService;
use Illuminate\Support\Facades\Log;
use Throwable;

class CancelSubscriptionController extends Controller
{
    private UserService $userService;
    private CancelSubscriptionService $cancelSubscriptionService;

    public function __construct(
        UserService $userService,
        CancelSubscriptionService $cancelSubscriptionService
    ) {
        $this->userService               = $userService;
        $this->cancelSubscriptionService = $cancelSubscriptionService;
    }

    public function __invoke(int $userId)
    {
        try {
            $user = $this->userService->findById($userId);
            if ( ! $user instanceof User) {
                return redirect()
                    ->back()
                    ->with('error', 'User not found!');
            }

            $this->cancelSubscriptionService->cancel($user);

            return redirect()
                ->back()
                ->with('success', "{$user->getName()} subscription has been cancelled successfully!");
        } catch (Throwable $e) {
            Log::error('failed to cancel subscription', [
                'error_message' => $e->getMessage(),
            ]);

            return redirect()
                ->route('admin.home')
                ->with('error', 'Error occurred, please retry later.');
        }
    }
}