<?php

namespace App\Repositories\NewsletterHistory;

use App\Models\NewsletterHistory;

class NewsletterHistoryRepository
{
    public function getAllByUser(int $userId)
    {
        return NewsletterHistory::query()
            ->where(NewsletterHistory::USER_ID_COLUMN, $userId)
            ->get();
    }

    public function create(array $attributes): NewsletterHistory
    {
        return NewsletterHistory::query()
            ->create($attributes);
    }
}