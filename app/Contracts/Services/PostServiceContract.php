<?php

declare(strict_types=1);

namespace App\Contracts\Services;

use App\Models\Post;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface PostServiceContract
{
    public function getItems(): Collection;

    public function getItemsWithPagination(): LengthAwarePaginator;

    public function findByIdOrFail(int $id): Post;

    public function update(Post $post, array $data): Post;

    public function create(array $data): Post;

    public function delete(Post $post): void;
}
