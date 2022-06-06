<?php

namespace App\Http\Controllers\Client\Post;

use App\Http\Controllers\Controller;
use App\Services\Core\Post\PostService;
use Illuminate\Support\Facades\Log;
use Throwable;

class ShowPostController extends Controller
{
    private PostService $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function __invoke(?string $locale, int $postId)
    {
        try {
            $post = $this->postService->findById($postId);

            return view('client.posts.show')
                ->with('post', $post);
        } catch (Throwable $e) {
            Log::error('failed to show post', [
                'error_message' => $e->getMessage()
            ]);

            return redirect()
                ->route('dashboard.home')
                ->with('error', __('Error occurred, please retry later!'));
        }
    }
}
