<?php

namespace App\Services\Domain\Post;

use App\Models\Post;
use App\Services\Core\Post\PostService;
use Illuminate\Http\UploadedFile;

class CreatePostService
{
    private PostService $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function create(array $attributes, UploadedFile $thumbnail): bool
    {
        $thumbnailFileName = $thumbnail->hashName();
        $thumbnail->storeAs(
            'public/posts_thumbnails',
            $thumbnailFileName
        );

        $attributes[Post::THUMBNAIL_FILE_NAME_COLUMN] = $thumbnailFileName;

        $this->postService->create($attributes);

        return true;
    }
}