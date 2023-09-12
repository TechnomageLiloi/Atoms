<?php

namespace Liloi\Atoms\Domain\Maps;

class Statuses
{
    public const TODO = 1;
    public const COMPOSE = 2;
    public const ACTIVE = 3;

    static public array $list = [
        self::TODO => 'To Do',
        self::COMPOSE => 'Compose',
        self::ACTIVE => 'Active',
    ];

    // @todo: move this method to more abstract level.
    public static function getClass(string $id): string
    {
        return strtolower(str_replace(' ', '-', self::$list[$id]));
    }
}