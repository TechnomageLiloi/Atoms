<?php

namespace Liloi\Atoms\API\Repositories\Remove;

use Liloi\API\Response;
use Liloi\Atoms\API\Method as SuperMethod;
use Liloi\Atoms\Domain\Repositories\Manager as MapsManager;

/**
 * Rune API: Blueprint.Blueprints.Show
 * @package Liloi\Librarium\API\Blueprints\Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $keyAtom = self::getParameter('keyAtom');
        $entity = MapsManager::load($keyAtom);
        $entity->remove();

        return new Response();
    }
}