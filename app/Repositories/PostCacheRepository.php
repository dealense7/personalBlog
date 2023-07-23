<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\Repositories\PostRepositoryContract;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Cache\Repository as CacheContract;

class PostCacheRepository extends CacheRepository implements PostRepositoryContract
{
    protected string $namespace = 'mor';

    private readonly PostRepository $repository;

    public function __construct(CacheContract $cache, PostRepository $repository)
    {
        $this->cache = $cache;
        $this->repository = $repository;
    }

    public function getItems(array $filters = []): Collection
    {
        if (!empty($filters)) {
            return $this->repository->getItems($filters);
        }

        $key = $this->createKeyFromArgs([], 'getItems');

        return $this->remember($key, function () use ($filters) {
            return $this->repository->getItems($filters);
        }, 7000);
    }

    public function getItemsWithPagination(array $filters = []): LengthAwarePaginator
    {
        if (!empty($filters)) {
            return $this->repository->getItemsWithPagination($filters);
        }
        $key = $this->createKeyFromArgs([], 'getItemsWithPagination');

        return $this->remember($key, function () use ($filters) {
            return $this->repository->getItemsWithPagination($filters);
        }, 7000);
    }

    public function create(array $data, Collection $tags, array $fileData): Post
    {
        $model = $this->repository->create($data, $tags, $fileData);

        $key = $this->createKeyFromArgs([
            $model->getId()
        ], 'post');

        $this->forget('getItems');
        $this->forget('getItemsWithPagination');

        return $this->remember($key, function () use ($model) {
            return $model;
        }, 7000);
    }

    public function update(Post $post, array $data, Collection $tags, array $fileData = []): Post
    {
        $key = $this->createKeyFromArgs([
            $post->getId()
        ], 'post');

        $this->forget($key);
        $this->forget('getItems');
        $this->forget('getItemsWithPagination');

        return $this->remember($key, function () use ($post, $data, $tags, $fileData) {
            return $this->repository->update($post, $data, $tags, $fileData);
        }, 7000);
    }

    public function getById(int $id): ?Post
    {
        $key = $this->createKeyFromArgs([
            $id
        ], 'post');

        return $this->remember($key, function () use ($id) {
            return $this->repository->getById($id);
        }, 7000);
    }

    public function delete(Post $post): void
    {
        $key = $this->createKeyFromArgs([
            $post->getId()
        ], 'post');

        $this->forget($key);

        $this->repository->delete($post);
    }
}
