<?php

namespace App\Repositories\Post;

use App\Models\Post;
use App\Repositories\AbstractEloquentRepository;

class PostRepository extends AbstractEloquentRepository
{
    public function findById(string $id): ?PostRepository
    {
    }

    public function create(array $attributes): Post
    {
    }

    protected function getModelClass(): string
    {
        return Post::class;
    }
}
