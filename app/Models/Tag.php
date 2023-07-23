<?php

namespace App\Models;


/**
 * @property int $id
 * @property string $name
 */
class Tag extends Model
{
    protected $table = 'tags';

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
