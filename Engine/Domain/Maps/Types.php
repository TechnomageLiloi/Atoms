<?php

namespace Liloi\Atoms\Domain\Maps;

class Types
{
    public const FOLDER = 1;
    public const ATOM = 2;
    public const DEGREE = 3;

    static public array $list = [
        self::DEGREE => 'Degree',
        self::FOLDER => 'Folder',
        self::ATOM => 'Atom'
    ];

    // @todo: move this method to more abstract level.
    public static function getClass(string $id): string
    {
        return strtolower(str_replace(' ', '-', self::$list[$id]));
    }
}