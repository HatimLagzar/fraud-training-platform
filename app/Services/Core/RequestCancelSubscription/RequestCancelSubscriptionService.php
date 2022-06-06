<?php

namespace App\Services\Core\RequestCancelSubscription;

use App\Models\RequestCancelSubscription;
use App\Models\User;
use App\Repositories\RequestCancelSubscription\RequestCancelSubscriptionRepository;

class RequestCancelSubscriptionService
{
    private RequestCancelSubscriptionRepository $requestCancelSubscriptionRepository;

    public function __construct(RequestCancelSubscriptionRepository $requestCancelSubscriptionRepository)
    {
        $this->requestCancelSubscriptionRepository = $requestCancelSubscriptionRepository;
    }

    public function findById(string $id): ?RequestCancelSubscription
    {
        return $this->requestCancelSubscriptionRepository->findById($id);
    }

    public function updateOrCreate(User $user)
    {
        return $this->requestCancelSubscriptionRepository->updateOrCreate([
            RequestCancelSubscription::USER_ID_COLUMN => $user->getId()
        ]);
    }

    public function getAll()
    {
        return $this->requestCancelSubscriptionRepository->getAll();
    }

    public function removeByUser(User $user): bool
    {
        return $this->requestCancelSubscriptionRepository->removeByUser($user->getId());
    }
}
