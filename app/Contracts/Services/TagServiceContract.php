<?php

declare(strict_types=1);

namespace App\Contracts\Services;

use App\Models\File;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;

interface TagServiceContract
{
    public function findOrCreate(array $slugs): Collection;
}
