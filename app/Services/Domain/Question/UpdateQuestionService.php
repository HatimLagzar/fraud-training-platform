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

    public function update(
        Question $question,
        string $content,
        string $contentFR,
        string $contentES,
        string $contentIT,
        string $contentDE,
        array $replies,
        int $correctReply
    ): bool {
        $this->questionService->update($question, [
            Question::CONTENT_COLUMN    => $content,
            Question::CONTENT_FR_COLUMN => $contentFR,
            Question::CONTENT_ES_COLUMN => $contentES,
            Question::CONTENT_IT_COLUMN => $contentIT,
            Question::CONTENT_DE_COLUMN => $contentDE,
        ]);

        $this->replyService->deleteAllByQuestion($question);

        foreach ($replies as $key => $reply) {
            $this->replyService->create([
                Reply::QUESTION_ID_COLUMN => $question->getId(),
                Reply::CONTENT_COLUMN     => $reply['en'],
                Reply::CONTENT_FR_COLUMN  => $reply['fr'],
                Reply::CONTENT_ES_COLUMN  => $reply['es'],
                Reply::CONTENT_IT_COLUMN  => $reply['it'],
                Reply::CONTENT_DE_COLUMN  => $reply['de'],
                Reply::IS_CORRECT_COLUMN  => $key === $correctReply,
            ]);
        }

        return true;
    }
}