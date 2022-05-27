<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\AbstractEloquentRepository;

class UserRepository extends AbstractEloquentRepository
{
    public function findById(string $id): ?UserRepository
    {
    }

    public function create(array $attributes): User
    {
    }

    protected function getModelClass(): string
    {
        return User::class;
    }
}
