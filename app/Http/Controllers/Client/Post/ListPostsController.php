<?php

namespace App\Http\Controllers\Client\Post;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Core\Post\PostService;
use Illuminate\Support\Facades\Log;
use Throwable;

class ListPostsController extends Controller
{
    private PostService $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function __invoke()
    {
        try {
            /** @var User $user */
            $user = auth()->user();

            $posts = $this->postService->getAllByCountry($user->getCountryId());

            return view('client.posts.index')
                ->with('posts', $posts);
        } catch (Throwable $e) {
            Log::error('failed to list posts', [
                'error_message' => $e->getMessage()
            ]);

            return redirect()
                ->route('dashboard.home')
                ->with('error', 'Error occurred, please retry later.');
        }
    }
}
