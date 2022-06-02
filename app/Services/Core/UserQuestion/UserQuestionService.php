<?php

namespace App\Services\Core\UserQuestion;

use App\Models\UserQuestion;
use App\Repositories\UserQuestion\UserQuestionRepository;

class UserQuestionService
{
    private UserQuestionRepository $userQuestionRepository;

    public function __construct(UserQuestionRepository $userQuestionRepository)
    {
        $this->userQuestionRepository = $userQuestionRepository;
    }

    public function findById(string $id): ?UserQuestion
    {
        return $this->userQuestionRepository->findById($id);
    }

    public function create(array $attributes): UserQuestion
    {
        return $this->userQuestionRepository->create($attributes);
    }
}
