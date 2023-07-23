<?php

declare(strict_types=1);

namespace App\Contracts\DataTransferObjects;


use Illuminate\Support\Collection;
use function count;

abstract class DTOContract
{
    abstract public static function toExternal(object | array $data): self;

    public function toArray(): array
    {
        return (array) $this;
    }

    public function getData(object | array $data, string $key, mixed $default = null): mixed
    {
        return data_get($data, $key, $default);
    }

    public function getRelationCollection(object | array $data, string $relation, DTOContract $contract): Collection
    {
        $relationData = $this->getData($data, $relation);

        $dtoData = [];
        if (
            $relationData !== null
            && count($relationData) > 0
        ) {
            foreach ($relationData as $item) {
                $dtoData[] = $contract::toExternal($item);
            }
        }

        return new Collection($dtoData);
    }

    public function getRelation(object | array $data, string $relation, DTOContract $contract, bool $defaultNull = false): ?DTOContract
    {
        $relationData = $this->getData($data, $relation);

        if (
            $relationData !== null
        ) {
            return $contract::toExternal($relationData);
        }
        if ($defaultNull) {
            return null;
        }

        return $contract;
    }

    public static function toInternal(array $data): array
    {
        return [];
    }
}
