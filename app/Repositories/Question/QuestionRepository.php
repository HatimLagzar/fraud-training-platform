<?php

namespace App\Repositories\Question;

use App\Models\Question;
use App\Repositories\AbstractEloquentRepository;
use Illuminate\Database\Eloquent\Collection;

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

    public function findById(string $id): ?QuestionRepository
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

    protected function getModelClass(): string
    {
        return Question::class;
    }
}
