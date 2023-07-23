<?php

declare(strict_types=1);

namespace App\Services;


use App\Contracts\Repositories\FileRepositoryContract;
use App\Contracts\Repositories\PostRepositoryContract;
use App\Contracts\Repositories\TagRepositoryContract;
use App\Contracts\Services\FileServiceContract;
use App\Contracts\Services\PostServiceContract;
use App\Contracts\Services\TagServiceContract;
use App\DataTransferObjects\PostDto;
use App\Models\File;
use App\Models\Post;
use App\Repositories\RepositoryManager;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TagService extends Service implements TagServiceContract
{
    public function __construct(
        private readonly TagRepositoryContract $repository
    )
    {
    }

    public function findOrCreate(array $tags): Collection
    {
        $collection = new Collection();
        foreach ($tags as $tag){
            $collection->push($this->repository->firstOrCreate($tag));
        }

        return $collection;
    }
}

