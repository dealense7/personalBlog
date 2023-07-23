<?php

declare(strict_types=1);

namespace App\Services;


use App\Contracts\Repositories\FileRepositoryContract;
use App\Contracts\Repositories\PostRepositoryContract;
use App\Contracts\Services\FileServiceContract;
use App\Contracts\Services\PostServiceContract;
use App\DataTransferObjects\PostDto;
use App\Models\File;
use App\Models\Post;
use App\Repositories\RepositoryManager;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileService extends Service implements FileServiceContract
{
    public function upload(UploadedFile $file): array
    {

        $mimeType = $file->getClientOriginalExtension();

        $filename = Str::uuid() . '.' . $mimeType;

        $path = Carbon::now()->format('Y-m') . '/' . $filename;

        Storage::disk('public')->put($path, $file->getContent());

        $size = Storage::disk('public')->size($path);

        return [
            'file_name' => $filename,
            'path' => $path,
            'size' => $size,
            'mime_type' => $mimeType,
        ];
    }
}

