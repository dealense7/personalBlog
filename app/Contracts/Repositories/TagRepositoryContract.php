<?php

declare(strict_types=1);

namespace App\Contracts\Repositories;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface TagRepositoryContract
{
    public function firstOrCreate(string $tag): Tag;
}

