<?php

namespace App\Services\Core\Post;

use App\Models\Post;
use App\Repositories\Country\CountryRepository;
use App\Repositories\Post\PostRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

class PostService
{
    private PostRepository $postRepository;
    private CountryRepository $countryRepository;

    public function __construct(PostRepository $postRepository, CountryRepository $countryRepository)
    {
        $this->postRepository    = $postRepository;
        $this->countryRepository = $countryRepository;
    }

    public function findById(string $id): ?Post
    {
        $post = $this->postRepository->findById($id);
        if ( ! $post instanceof Post) {
            return null;
        }

        return $this->hydrate($post);
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

    /**
     * @param  int  $countryId
     *
     * @return Post[]|Collection
     */
    public function getAllByCountry(int $countryId): Collection
    {
        $posts = $this->postRepository->getAllByCountry($countryId);

        return $posts->transform(function (Post $post) {
            return $this->hydrate($post);
        });
    }

    private function hydrate(Post $post): Post
    {
        $country = $this->countryRepository->findById($post->getCountryId());
        $post->setCountry($country);

        return $post;
    }
}
