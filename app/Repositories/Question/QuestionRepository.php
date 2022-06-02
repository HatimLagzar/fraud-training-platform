<?php

namespace App\Repositories\Question;

use App\Models\Question;
use App\Models\UserQuestion;
use App\Repositories\AbstractEloquentRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class QuestionRepository extends AbstractEloquentRepository
{
    /**
     * @return Collection|Question[]
     */
    public function getAll(): Collection
    {
        return $this->getQueryBuilder()
                    ->get();
    }

    public function findById(string $id): ?Question
    {
        return $this->getQueryBuilder()
                    ->where(Question::ID_COLUMN, $id)
                    ->first();
    }

    public function create(array $attributes): Question
    {
        return $this->getQueryBuilder()
                    ->create($attributes);
    }

    public function destroy(int $id): bool
    {
        return $this->getQueryBuilder()
                    ->where(Question::ID_COLUMN, $id)
                    ->delete() > 0;
    }

    public function update(int $id, array $attributes): bool
    {
        return $this->getQueryBuilder()
                    ->where(Question::ID_COLUMN, $id)
                    ->update($attributes) > 0;
    }

    /**
     * @return Collection|Question
     */
    public function getAllNotSeenByUser(int $userId): Collection
    {
        return $this->getQueryBuilder()
                    ->whereNotExists(function ($db) use ($userId) {
                        $db->select(DB::raw(1))
                           ->from(UserQuestion::TABLE)
                           ->where(UserQuestion::USER_ID_COLUMN, $userId)
                           ->whereRaw(sprintf('%s.%s', UserQuestion::TABLE, UserQuestion::QUESTION_ID_COLUMN).' = '.sprintf('%s.%s', Question::TABLE, Question::ID_COLUMN));
                    })
                    ->get();
    }

    protected function getModelClass(): string
    {
        return Question::class;
    }
}
