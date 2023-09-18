<?php

namespace Liloi\Atoms\API\Maps\Save;

use Liloi\API\Response;
use Liloi\Atoms\API\Method as SuperMethod;
use Liloi\Atoms\Domain\Maps\Manager as MapsManager;

/**
 * Rune API: Blueprint.Blueprints.Show
 * @package Liloi\Librarium\API\Blueprints\Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $keyMap = self::getParameter('key_map');
        $entity = MapsManager::load($keyMap);

        $entity->setTitle(self::getParameter('title'));
        $entity->setStatus(self::getParameter('status'));
        $entity->setType(self::getParameter('type'));
        $entity->setProgram(self::getParameter('program'));

        $entity->save();

        return new Response();
    }
}