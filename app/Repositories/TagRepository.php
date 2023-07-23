<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\Repositories\PostRepositoryContract;
use App\Contracts\Repositories\TagRepositoryContract;
use App\Models\Post;
use App\Models\Tag;
use App\Repositories\Repository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;

class TagRepository extends Repository implements TagRepositoryContract
{
    public function firstOrCreate(string $tag): Tag
    {
        $model = $this->getModel();

        return $model->firstOrCreate(
            [
                'slug' => Str::slug($tag)
            ],
            [
                'name' => $tag,
                'slug' => Str::slug($tag)
            ]
        );
    }

    public function getModel(): Tag
    {
        return new Tag();
    }
}
