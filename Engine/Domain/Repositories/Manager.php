<?php

namespace Liloi\Atoms\Domain\Repositories;

use Liloi\Atoms\Domain\Manager as DomainManager;
use Liloi\Atoms\Exceptions\IncorrectException;

class Manager extends DomainManager
{
    /**
     * Get table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'repositories';
    }

    public static function loadByMap(string $keyMap): Collection
    {
        $collection = new Collection();

        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            "select * from %s where key_map ='%s';",
            $name, $keyMap
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
        $name = self::getTableName();

        self::getAdapter()->insert($name, [
            'key_map' => $keyMap,
            'title' => 'enter the title',
            'summary' => '',
            'global' => '',
            'local' => ''
        ]);
    }

    public static function load(string $keyAtom): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_atom="%s";',
            $name, $keyAtom
        ));

        if(!$row)
        {
            $row = [
                'key_atom' => $keyAtom,
                'key_map' => 'wiki',
                'title' => 'enter the title',
                'summary' => '',
                'global' => '',
                'local' => ''
            ];

            self::getAdapter()->insert($name, $row);
        }

        return Entity::create($row);
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();
        unset($data['key_atom']);

        self::update($name, $data, sprintf('key_atom="%s"', $entity->getKeyAtom()));
    }

    public static function remove(Entity $entity): void
    {
        $name = self::getTableName();
        self::getAdapter()->delete($name, sprintf('key_atom="%s"', $entity->getKeyAtom()));
    }
}