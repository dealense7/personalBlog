<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property int $id
 * @property string $path
 * @property string $file_name
 * @property string $mime_type
 * @property int $size
 * @property int $fileable_id
 * @property string $fileable_type
 */
class File extends Model
{
    protected $fillable = [
        'path',
        'file_name',
        'mime_type',
        'size',
        'fileable_id',
        'fileable_type',
    ];

    public function getId(): int
    {
        return $this->id;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getFileName(): string
    {
        return $this->file_name;
    }

    public function getMimeType(): string
    {
        return $this->mime_type;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function getFileableId(): int
    {
        return $this->fileable_id;
    }

    public function getFileableType(): string
    {
        return $this->fileable_type;
    }

    public function fileable(): MorphTo
    {
        return $this->morphTo();
    }
}
