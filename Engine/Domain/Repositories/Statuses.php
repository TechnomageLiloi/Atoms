<?php

namespace Liloi\Atoms\Domain\Repositories;

/**
 * Class Statuses
 *
 * @package Liloi\Atoms\Domain\Interstate
 * @see \Liloi\Atoms\Domain\Interstate\StatusesTest
 */
class Statuses
{
    public const PUBLISHED = 1;
    public const PERSONAL = 2;

    // @ToDo: To more abstract level with redefine.
    static public array $list = [
        self::PUBLISHED => 'Published',
        self::PERSONAL => 'Personal'
    ];

    // @todo: move this method to more abstract level.
    public static function getClass(string $id): string
    {
        return strtolower(str_replace(' ', '-', self::$list[$id]));
    }
}