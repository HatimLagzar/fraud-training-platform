<?php

namespace App\Repositories\RequestCancelSubscription;

use App\Models\RequestCancelSubscription;
use App\Models\User;
use App\Repositories\AbstractEloquentRepository;

class RequestCancelSubscriptionRepository extends AbstractEloquentRepository
{
    public function findById(string $id): ?RequestCancelSubscription
    {
        return $this->getQueryBuilder()
                    ->where(RequestCancelSubscription::ID_COLUMN, $id)
                    ->first();
    }

    public function updateOrCreate(array $attributes)
    {
        return $this->getQueryBuilder()
                    ->updateOrCreate($attributes);
    }

    public function getAll()
    {
        return $this->getQueryBuilder()
                    ->select(sprintf('%s.%s', User::TABLE, '*'))
                    ->leftJoin(
                        User::TABLE,
                        sprintf('%s.%s', User::TABLE, User::ID_COLUMN),
                        sprintf('%s.%s', RequestCancelSubscription::TABLE, RequestCancelSubscription::USER_ID_COLUMN),
                    )
                    ->get();
    }

    public function removeByUser(int $userId): bool
    {
        return $this->getQueryBuilder()
                    ->where(RequestCancelSubscription::USER_ID_COLUMN, $userId)
                    ->delete() > 0;
    }

    protected function getModelClass(): string
    {
        return RequestCancelSubscription::class;
    }
}
