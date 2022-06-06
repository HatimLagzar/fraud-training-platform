<?php

namespace App\Http\Controllers\Client\Settings\Subscription;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Core\RequestCancelSubscription\RequestCancelSubscriptionService;
use Illuminate\Http\RedirectResponse;

class RequestCancelSubscriptionController extends Controller
{
    private RequestCancelSubscriptionService $requestCancelSubscriptionService;

    public function __construct(RequestCancelSubscriptionService $requestCancelSubscriptionService)
    {
        $this->requestCancelSubscriptionService = $requestCancelSubscriptionService;
    }

    public function __invoke(): RedirectResponse
    {
        /** @var User $user */
        $user = auth()->guard('web')->user();

        if ($user->subscribed() === false) {
            return redirect()
                ->back()
                ->with('error', 'Action not allowed, you are not subscribed!');
        }

        $this->requestCancelSubscriptionService->updateOrCreate($user);

        return redirect()
            ->route('dashboard.settings.index')
            ->with('success', 'Your request was sent to the admin.');
    }
}