<?php

namespace App\Repositories\RequestCancelSubscription;

use App\Models\RequestCancelSubscription;
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

    protected function getModelClass(): string
    {
        return RequestCancelSubscription::class;
    }
}
