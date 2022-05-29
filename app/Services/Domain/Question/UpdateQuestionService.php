<?php

namespace App\Services\Domain\Question;

use App\Models\Question;
use App\Models\Reply;
use App\Services\Core\Question\QuestionService;
use App\Services\Core\Reply\ReplyService;

class UpdateQuestionService
{
    private QuestionService $questionService;
    private ReplyService $replyService;

    public function __construct(QuestionService $questionService, ReplyService $replyService)
    {
        $this->questionService = $questionService;
        $this->replyService    = $replyService;
    }

    public function update(Question $question, string $content, array $replies, int $correctReply): bool
    {
        $this->questionService->update($question, [
            Question::CONTENT_COLUMN => $content
        ]);

        $this->replyService->deleteAllByQuestion($question);

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