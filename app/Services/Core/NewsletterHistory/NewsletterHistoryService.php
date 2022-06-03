<?php

namespace App\Services\Core\NewsletterHistory;

use App\Models\NewsletterHistory;
use App\Models\User;
use App\Repositories\NewsletterHistory\NewsletterHistoryRepository;

class NewsletterHistoryService
{
    private NewsletterHistoryRepository $newsletterHistoryRepository;

    public function __construct(NewsletterHistoryRepository $newsletterHistoryRepository)
    {
        $this->newsletterHistoryRepository = $newsletterHistoryRepository;
    }

    public function getAllByUser(User $user)
    {
        return $this->newsletterHistoryRepository->getAllByUser($user->getId());
    }

    public function create(array $attributes): NewsletterHistory
    {
        return $this->newsletterHistoryRepository->create($attributes);
    }
}