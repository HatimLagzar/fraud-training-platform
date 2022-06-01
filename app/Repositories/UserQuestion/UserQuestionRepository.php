<?php

namespace App\Repositories\UserQuestion;

use App\Models\UserQuestion;
use App\Repositories\AbstractEloquentRepository;

class UserQuestionRepository extends AbstractEloquentRepository
{
    public function findById(string $id): ?UserQuestion
    {
    }

    public function create(array $attributes): UserQuestion
    {
    }

    protected function getModelClass(): string
    {
        return UserQuestion::class;
    }
}
