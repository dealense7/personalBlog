<?php

declare(strict_types=1);

namespace App\Contracts\Services;

use App\Models\File;
use Illuminate\Http\UploadedFile;

interface FileServiceContract
{
    public function upload(UploadedFile $file): array;
}
