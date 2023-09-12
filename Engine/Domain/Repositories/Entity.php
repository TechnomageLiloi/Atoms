<?php

namespace Liloi\Atoms\Domain\Repositories;

use Liloi\Stylo\Parser;
use Liloi\Tools\Entity as AbstractEntity;

/**
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getSummary()
 * @method void setSummary(string $value)
 *
 * @method string getGlobal()
 * @method void setGlobal(string $value)
 *
 * @method string getLocal()
 * @method void setLocal(string $value)
 *
 * @method string getStatus()
 * @method void setStatus(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKeyAtom(): string
    {
        return $this->getField('key_atom');
    }

    public function getKeyMap(): string
    {
        return $this->getField('key_map');
    }

    public function save(): void
    {
        Manager::save($this);
    }

    public function remove(): void
    {
        Manager::remove($this);
    }

    /**
     * Parse summary parameter with Stylo.
     *
     * @return string
     */
    public function parseSummary(): string
    {
        return Parser::parseString($this->getSummary());
    }

    /**
     * Get atoms status title (one of {@link \Liloi\Atoms\Domain\Repositories\Statuses} constants).
     *
     * @return string
     */
    public function getStatusCaption(): string
    {
        return Statuses::$list[$this->getStatus()];
    }
}