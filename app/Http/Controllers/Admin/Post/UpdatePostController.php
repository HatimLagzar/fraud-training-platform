<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Services\Domain\Post\UpdatePostService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Throwable;

class UpdatePostController extends Controller
{
    private UpdatePostService $updatePostService;

    public function __construct(UpdatePostService $updatePostService)
    {
        $this->updatePostService = $updatePostService;
    }

    public function __invoke(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        try {
            $this->updatePostService->update(
                $post,
                $request->validated(),
                $request->file('thumbnail')
            );

            return redirect()
                ->route('admin.posts.index')
                ->with('success', 'Post has been updated successfully.');
        } catch (Throwable $e) {
            Log::error('failed to update post', [
                'error_message' => $e->getMessage()
            ]);

            return redirect()
                ->route('admin.home')
                ->with('error', 'Error occurred, please retry later!');
        }
    }
}
