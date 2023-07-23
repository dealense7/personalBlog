<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\Repositories\PostRepositoryContract;
use App\Models\Post;
use App\Repositories\Repository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PostRepository extends Repository implements PostRepositoryContract
{
    public function getItems(array $filters = []): Collection
    {
        $model = $this->getModel();
        $items = $model->with([
            'image',
            'tags'
        ]);

        $items = $items->orderBy('id', 'desc');

        return $items->get();
    }

    public function getItemsWithPagination(array $filters = []): LengthAwarePaginator
    {
        $model = $this->getModel();
        $items = $model->with([
            'image',
            'tags'
        ]);

        $items = $items->orderBy('id', 'desc');

        return $items->paginate(15);
    }

    public function create(array $data, Collection $tags, array $fileData): Post
    {
        $model = $this->getModel();

        return $this->update($model, $data, $tags, $fileData);
    }

    public function update(Post $post, array $data, Collection $tags, array $fileData = []): Post
    {
        $post->fill($data);
        $post->saveOrFail();

        $post->refresh();

        if (!empty($fileData)) {
            $post->image()->create($fileData);
        }

        $post->tags()->sync($tags);

        $post->load([
            'image',
            'tags'
        ]);

        return $post;
    }

    public function getById(int $id): ?Post
    {
        /** @var Post|null $item */
        $item = $this->getModel()
            ->with([
                'image',
                'tags'
            ])->firstWhere('id', $id);

        return $item;
    }

    public function delete(Post $post): void
    {
        $post->image()->delete();
        $post->tags()->detach();
        $post->delete();
    }

    public function getModel(): Post
    {
        return new Post();
    }
}
