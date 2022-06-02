<?php

namespace App\Services\Domain\Quiz;

use App\Models\Question;
use App\Models\Reply;
use App\Models\User;
use App\Models\UserQuestion;
use App\Services\Core\UserQuestion\UserQuestionService;

class ReplyQuizService
{
    private UserQuestionService $userQuestionService;

    public function __construct(UserQuestionService $userQuestionService)
    {
        $this->userQuestionService = $userQuestionService;
    }

    public function reply(User $user, Question $question, Reply $reply): UserQuestion
    {
        return $this->userQuestionService->create([
            UserQuestion::USER_ID_COLUMN     => $user->getId(),
            UserQuestion::QUESTION_ID_COLUMN => $question->getId(),
            UserQuestion::REPLY_ID_COLUMN    => $reply->getId(),
        ]);
    }
}