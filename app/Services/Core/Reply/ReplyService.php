<?php

namespace App\Services\Core\Reply;

use App\Models\Question;
use App\Models\Reply;
use App\Repositories\Reply\ReplyRepository;
use Illuminate\Database\Eloquent\Collection;

class ReplyService
{
    private ReplyRepository $replyRepository;

    public function __construct(ReplyRepository $replyRepository)
    {
        $this->replyRepository = $replyRepository;
    }

    public function findById(string $id): ?Reply
    {
        return $this->replyRepository->findById($id);
    }

    /**
     * @return Collection|Reply[]
     */
    public function getAllByQuestion(Question $question): Collection
    {
        return $this->replyRepository->getAllByQuestion($question->getId());
    }

    public function create(array $attributes): Reply
    {
        return $this->replyRepository->create($attributes);
    }
}
