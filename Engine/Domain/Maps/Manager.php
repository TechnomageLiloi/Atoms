<?php

namespace Liloi\Atoms\Domain\Maps;

use Liloi\Atoms\Domain\Manager as DomainManager;
use Liloi\Atoms\Exceptions\IncorrectException;

class Manager extends DomainManager
{
    public const ROOT = 'place-of-power';

    /**
     * Get table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'maps';
    }

    public static function loadCollection(): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s order by key_map desc limit 100;',
            $name
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function loadByKeys(array $listKeys): Collection
    {
        $collection = new Collection();

        if(!count($listKeys))
        {
            return $collection;
        }

        $keys = implode("', '", $listKeys);

        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            "select * from %s where key_map in ('%s');",
            $name, $keys
        ));

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    // @todo: rise this method to more abstract level.
    public static function create(string $keyMap): void
    {
        if(!self::checkMap($keyMap))
        {
            throw new IncorrectException();
        }

        $name = self::getTableName();

        self::getAdapter()->insert($name, [
            'key_map' => $keyMap,
            'title' => $keyMap,
            'status' => Statuses::TODO,
            'program' => ''
        ]);
    }

    public static function load(string $keyMap): Entity
    {
        if(!self::checkMap($keyMap))
        {
            throw new IncorrectException();
        }

        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_map="%s";',
            $name, $keyMap
        ));

        if(!$row)
        {
            $row = [
                'key_map' => $keyMap,
                'title' => $keyMap,
                'status' => Statuses::TODO,
                'program' => ''
            ];

            self::getAdapter()->insert($name, $row);
        }

        return Entity::create($row);
    }

    public static function loadFiles(string $keyMap): Collection
    {
        $name = self::getTableName();

        $sqlStatus = '';

        $sql = sprintf(
            'select * from %s where %s (key_map like "%s:%%") && (key_map not like "%s:%%:%%") order by title asc;',
            $name, $sqlStatus, $keyMap, $keyMap
        );

        $rows = self::getAdapter()->getArray($sql);

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();
        unset($data['key_map']);

        self::update($name, $data, sprintf('key_map="%s"', $entity->getKey()));
    }

    public static function remove(Entity $entity): void
    {
        $name = self::getTableName();
        self::getAdapter()->delete($name, sprintf('key_map="%s"', $entity->getKey()));
    }

    public static function URLToMap(string $URL): string
    {
        $withoutRoot = str_replace(ROOT_URL, '', $URL);

        $lower = strtolower(trim($withoutRoot, '/'));

        if(in_array($lower, ['', self::ROOT]))
        {
            return self::ROOT;
        }

        return self::ROOT . ':' . str_replace('/', ':', $lower);
    }

    public static function MapToURL(string $keyMap): string
    {
        if($keyMap === self::ROOT)
        {
            return ROOT_URL . '/' . self::ROOT;
        }

        $lower = strtolower(str_replace(self::ROOT . ':', '', $keyMap));
        return ROOT_URL . '/' . str_replace(':', '/', $lower);
    }

    public static function checkMap(string $keyMap): bool
    {
        return strpos($keyMap, '.') === FALSE;
    }
}