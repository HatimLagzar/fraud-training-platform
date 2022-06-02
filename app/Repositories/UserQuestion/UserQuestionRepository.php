<?php

namespace App\Repositories\UserQuestion;

use App\Models\UserQuestion;
use App\Repositories\AbstractEloquentRepository;

class UserQuestionRepository extends AbstractEloquentRepository
{
    public function findById(string $id): ?UserQuestion
    {
        return $this->getQueryBuilder()
                    ->where(UserQuestion::ID_COLUMN, $id)
                    ->first();
    }

    public function create(array $attributes): UserQuestion
    {
        return $this->getQueryBuilder()
                    ->create($attributes);
    }

    protected function getModelClass(): string
    {
        return UserQuestion::class;
    }
}
