<?php

namespace App\Repositories\Question;

use App\Models\Question;
use App\Repositories\AbstractEloquentRepository;

class QuestionRepository extends AbstractEloquentRepository
{
    public function findById(string $id): ?QuestionRepository
    {
    }

    public function create(array $attributes): Question
    {
    }

    protected function getModelClass(): string
    {
        return Question::class;
    }
}
