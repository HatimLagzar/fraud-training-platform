<?php

namespace App\Services\Domain\Question;

use App\Models\Question;
use App\Models\Reply;
use App\Services\Core\Question\QuestionService;
use App\Services\Core\Reply\ReplyService;

class CreateQuestionService
{
    private QuestionService $questionService;
    private ReplyService $replyService;

    public function __construct(QuestionService $questionService, ReplyService $replyService)
    {
        $this->questionService = $questionService;
        $this->replyService    = $replyService;
    }

    public function create(string $content, array $replies, int $correctReply): bool
    {
        $question = $this->questionService->create([
            Question::CONTENT_COLUMN => $content
        ]);

        foreach ($replies as $key => $reply) {
            $this->replyService->create([
                Reply::QUESTION_ID_COLUMN => $question->getId(),
                Reply::CONTENT_COLUMN     => $reply,
                Reply::IS_CORRECT_COLUMN  => $key === $correctReply,
            ]);
        }

        return true;
    }
}