<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * @property int $id
 * @property string $title
 * @property string $content
 */
class Post extends Model
{
    protected $table = 'posts';

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function image(): MorphOne
    {
        return $this->morphOne(File::class, 'fileable');
    }

    public function tags(): BelongsToMany
    {

        return $this->BelongsToMany(
            Tag::class,
            'post_tags',
            'post_id',
            'tag_id',
        );
    }
}
