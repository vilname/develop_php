<?php

namespace App\Models\Items\Dto;

use App\Interfaces\DtoInterface;

class ItemDto implements DtoInterface
{
    public ?string $name;
    public ?string $phone;
    public string $key;
    public ?string $createdAt;
    public ?string $updatedAt;

    public static array $items;

    public static function map(array $data): self
    {
        $o = new self();

        $o->name = $data['name'];
        $o->phone = $data['phone'];
        $o->key = $data['key'];
        $o->createdAt = $data['created_at'] ?? '';
        $o->updatedAt = $data['updated_at'] ?? '';

        return $o;
    }

    public static function nestedMap(array $data): array
    {
        foreach ($data as $field) {
            self::$items[] = self::map($field);
        }

        return self::$items;
    }
}