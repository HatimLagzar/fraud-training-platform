<?php

namespace App\Services\Core\Question;

use App\Models\Question;
use App\Models\User;
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
        $question = $this->questionRepository->findById($id);
        if ( ! $question instanceof Question) {
            return null;
        }

        return $this->hydrate($question);
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

    public function destroy(Question $question): bool
    {
        return $this->questionRepository->destroy($question->getId());
    }

    public function update(Question $question, array $attributes): bool
    {
        return $this->questionRepository->update($question->getId(), $attributes);
    }

    /**
     * @return Question|Collection
     */
    public function getAllNotSeenByUser(User $user): Collection
    {
        $questions = $this->questionRepository->getAllNotSeenByUser($user->getId());

        return $questions->transform(function (Question $question) {
            return $this->hydrate($question);
        });
    }
}
