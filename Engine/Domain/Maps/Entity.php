<?php

namespace Liloi\Atoms\Domain\Maps;

use Liloi\Stylo\Parser;
use Liloi\Tools\Entity as AbstractEntity;

/**
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getStatus()
 * @method void setStatus(string $value)
 *
 * @method string getProgram()
 * @method void setProgram(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_map');
    }

    public function parseProgram(): string
    {
        return Parser::parseString($this->getProgram());
    }

    public function getStatusCaption(): string
    {
        return Statuses::$list[$this->getStatus()];
    }

    public function save(): void
    {
        Manager::save($this);
    }

    public function remove(): void
    {
        Manager::remove($this);
    }

    public function getUrl(): string
    {
        return Manager::MapToURL($this->getKey());
    }

    public function getSeeds(): string
    {
        $keyMapFull = $this->getKey();
        $rid = explode(':', $keyMapFull);

        $seeds = [];

        while(count($rid) > 0)
        {
            $keyMapSeed = implode(':', $rid);

            $seed = sprintf(
                '<a href="%s">%s</a>',
                Manager::MapToURL($keyMapSeed),
                strtoupper(str_replace('-', ' ', end($rid)))
            );

            array_unshift($seeds, $seed);
            array_pop($rid);
        }

        return implode(' &#9654; ', $seeds);
    }
}