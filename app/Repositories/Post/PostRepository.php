<?php

namespace App\Repositories\Post;

use App\Models\Post;
use App\Repositories\AbstractEloquentRepository;
use Illuminate\Database\Eloquent\Collection;

class PostRepository extends AbstractEloquentRepository
{
    public function findById(string $id): ?Post
    {
        return $this->getQueryBuilder()
                    ->where(Post::ID_COLUMN, $id)
                    ->first();
    }

    public function create(array $attributes): Post
    {
        return $this->getQueryBuilder()
                    ->create($attributes);
    }

    /**
     * @return Post[]|Collection
     */
    public function getAll(): Collection
    {
        return $this->getQueryBuilder()
                    ->get();
    }

    public function destroy(int $id): bool
    {
        return $this->getQueryBuilder()
                    ->where(Post::ID_COLUMN, $id)
                    ->delete() > 0;
    }

    public function update(int $id, array $attributes): bool
    {
        return $this->getQueryBuilder()
                    ->where(Post::ID_COLUMN, $id)
                    ->update($attributes) > 0;
    }

    protected function getModelClass(): string
    {
        return Post::class;
    }
}
