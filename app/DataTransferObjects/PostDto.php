<?php

declare(strict_types=1);

namespace App\DataTransferObjects;

use App\Contracts\DataTransferObjects\DTOContract;

class PostDto extends DTOContract
{
    public readonly int $id;
    public readonly string $title;
    public readonly string $content;

    public static function toExternal(object|array $data): DTOContract
    {
        $dto = new static();

        $dto->id = $dto->getData($data, 'id');
        $dto->title = $dto->getData($data, 'title');
        $dto->content = $dto->getData($data, 'content');

        return $dto;
    }


    public static function toInternal(array $data): array
    {
        $dto = [];

        if (!empty($data['title'])) {
            $dto['title'] = $data['title'];
        }

        if (!empty($data['editor'])) {
            $dto['content'] = $data['editor'];
        }

        return $dto;
    }

}
