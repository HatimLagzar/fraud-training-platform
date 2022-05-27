<?php

namespace App\Repositories\Reply;

use App\Models\Reply;
use App\Repositories\AbstractEloquentRepository;

class ReplyRepository extends AbstractEloquentRepository
{
    public function findById(string $id): ?ReplyRepository
    {
    }

    public function create(array $attributes): Reply
    {
    }

    protected function getModelClass(): string
    {
        return Reply::class;
    }
}
