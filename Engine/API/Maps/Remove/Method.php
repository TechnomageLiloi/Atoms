<?php

namespace Liloi\Atoms\API\Maps\Remove;

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
        $entity->remove();

        return new Response();
    }
}