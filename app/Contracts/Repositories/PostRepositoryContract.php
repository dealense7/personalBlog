<?php

declare(strict_types=1);

namespace App\Contracts\Repositories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface PostRepositoryContract
{
    public function getItems(array $filters = []): Collection;

    public function getItemsWithPagination(array $filters = []): LengthAwarePaginator;

    public function create(array $data, Collection $tags, array $fileData): Post;

    public function update(Post $post, array $data, Collection $tags, array $fileData = []): Post;

    public function delete(Post $post): void;

    public function getById(int $id): ?Post;
}

