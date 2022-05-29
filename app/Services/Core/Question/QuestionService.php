<?php

namespace App\Services\Core\Question;

use App\Models\Question;
use App\Repositories\Question\QuestionRepository;
use App\Repositories\Reply\ReplyRepository;
use Illuminate\Database\Eloquent\Collection;

class QuestionService
{
    private QuestionRepository $questionRepository;
    private ReplyRepository $replyRepository;

    public function __construct(QuestionRepository $questionRepository, ReplyRepository $replyRepository)
    {
        $this->questionRepository = $questionRepository;
        $this->replyRepository    = $replyRepository;
    }

    /**
     * @return Question[]|Collection
     */
    public function getAll(): Collection
    {
        $questions = $this->questionRepository->getAll();

        return $questions->transform(function (Question $question) {
            return $this->hydrate($question);
        });
    }

    public function findById(string $id): ?Question
    {
        return $this->questionRepository->findById($id);
    }

    public function create(array $attributes): Question
    {
        return $this->questionRepository->create($attributes);
    }

    private function hydrate(Question $question): Question
    {
        $replies = $this->replyRepository->getAllByQuestion($question->getId());
        $question->setReplies($replies);

        return $question;
    }
}
