<?php

namespace App\Services\Domain\Subscription;

use App\Models\User;
use App\Services\Core\RequestCancelSubscription\RequestCancelSubscriptionService;

class CancelSubscriptionService
{
    private RequestCancelSubscriptionService $requestCancelSubscriptionService;

    public function __construct(RequestCancelSubscriptionService $requestCancelSubscriptionService)
    {
        $this->requestCancelSubscriptionService = $requestCancelSubscriptionService;
    }

    public function cancel(User $user): bool
    {
        $user->subscription()->cancel();

        $this->requestCancelSubscriptionService->removeByUser($user);

        return true;
    }
}