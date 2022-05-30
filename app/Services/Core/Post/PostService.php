<?php

namespace App\Services\Core\Post;

use App\Models\Post;
use App\Repositories\Post\PostRepository;
use Illuminate\Support\Arr;

class PostService
{
    private PostRepository $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function findById(string $id): ?Post
    {
        return $this->postRepository->findById($id);
    }

    public function create(array $attributes): Post
    {
        $attributes = Arr::only($attributes, [
            Post::TITLE_COLUMN,
            Post::TITLE_FR_COLUMN,
            Post::TITLE_ES_COLUMN,
            Post::TITLE_DE_COLUMN,
            Post::TITLE_IT_COLUMN,
            Post::DESCRIPTION_COLUMN,
            Post::DESCRIPTION_FR_COLUMN,
            Post::DESCRIPTION_ES_COLUMN,
            Post::DESCRIPTION_DE_COLUMN,
            Post::DESCRIPTION_IT_COLUMN,
            Post::COUNTRY_ID_COLUMN,
            Post::THUMBNAIL_FILE_NAME_COLUMN,
        ]);

        return $this->postRepository->create($attributes);
    }

    public function getAll()
    {
        return $this->postRepository->getAll();
    }

    public function destroy(Post $post): bool
    {
        return $this->postRepository->destroy($post->getId());
    }

    public function update(Post $post, array $attributes): bool
    {
        $attributes = Arr::only($attributes, [
            Post::TITLE_COLUMN,
            Post::TITLE_FR_COLUMN,
            Post::TITLE_ES_COLUMN,
            Post::TITLE_DE_COLUMN,
            Post::TITLE_IT_COLUMN,
            Post::DESCRIPTION_COLUMN,
            Post::DESCRIPTION_FR_COLUMN,
            Post::DESCRIPTION_ES_COLUMN,
            Post::DESCRIPTION_DE_COLUMN,
            Post::DESCRIPTION_IT_COLUMN,
            Post::COUNTRY_ID_COLUMN,
            Post::THUMBNAIL_FILE_NAME_COLUMN,
        ]);

        return $this->postRepository->update($post->getId(), $attributes);
    }
}
