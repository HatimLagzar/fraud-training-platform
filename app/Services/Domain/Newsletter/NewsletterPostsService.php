<?php

namespace App\Services\Domain\Newsletter;

use App\Models\NewsletterHistory;
use App\Models\Post;
use App\Models\User;
use App\Services\Core\NewsletterHistory\NewsletterHistoryService;
use App\Services\Core\Post\PostService;
use Illuminate\Database\Eloquent\Collection;

class NewsletterPostsService
{
    private NewsletterHistoryService $newsletterHistoryService;
    private PostService $postService;

    public function __construct(
        NewsletterHistoryService $newsletterHistoryService,
        PostService $postService
    ) {
        $this->newsletterHistoryService = $newsletterHistoryService;
        $this->postService              = $postService;
    }

    /**
     * @return Collection|Post[]
     */
    public function get(User $user): Collection
    {
        $alreadySentPostsIds = $this->newsletterHistoryService->getAllByUser($user)
                                                              ->pluck(NewsletterHistory::POST_ID_COLUMN)
                                                              ->toArray();

        return $this->postService->getAllByCountry($user->getCountryId())
                                 ->filter(function (Post $post) use ($alreadySentPostsIds) {
                                     return in_array($post->getId(), $alreadySentPostsIds) === false;
                                 });
    }

    /**
     * @param  Collection|Post[]  $posts
     * @param  User  $user
     *
     * @return void
     */
    public function markAsSent(Collection $posts, User $user): void
    {
        $posts->each(function (Post $post) use ($user) {
            $this->newsletterHistoryService->create([
                NewsletterHistory::POST_ID_COLUMN => $post->getId(),
                NewsletterHistory::USER_ID_COLUMN => $user->getId(),
            ]);
        });
    }
}