<?php

namespace App\Repositories\Reply;

use App\Models\Reply;
use App\Repositories\AbstractEloquentRepository;
use Illuminate\Database\Eloquent\Collection;

class ReplyRepository extends AbstractEloquentRepository
{
    public function findById(string $id): ?Reply
    {
        return $this->getQueryBuilder()
                    ->where(Reply::ID_COLUMN, $id)
                    ->first();
    }

    /**
     * @return Collection|Reply[]
     */
    public function getAllByQuestion(int $questionId): Collection
    {
        return $this->getQueryBuilder()
                    ->where(Reply::QUESTION_ID_COLUMN, $questionId)
                    ->get();
    }

    public function create(array $attributes): Reply
    {
        return $this->getQueryBuilder()
                    ->create($attributes);
    }

    public function deleteAllByQuestion(int $questionId): bool
    {
        return $this->getQueryBuilder()
                    ->where(Reply::QUESTION_ID_COLUMN, $questionId)
                    ->delete() > 0;
    }

    protected function getModelClass(): string
    {
        return Reply::class;
    }
}
