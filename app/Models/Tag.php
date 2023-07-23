<?php

namespace App\Models;


/**
 * @property int $id
 * @property string $name
 * @property string $slug
 *
 */
class Tag extends Model
{
    protected $table = 'tags';

    protected $fillable = [
        'name',
        'slug',
    ];
    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }
}
