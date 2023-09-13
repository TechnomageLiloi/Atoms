<?php

namespace Liloi\Atoms\API\Repositories\Edit;

use Liloi\API\Response;
use Liloi\Atoms\API\Method as SuperMethod;
use Liloi\Atoms\Domain\Repositories\Manager as AtomsManager;
use Liloi\Atoms\Domain\Repositories\Statuses as AtomsStatuses;

/**
 * Rune API: Blueprint.Blueprints.Show
 * @package Liloi\Librarium\API\Blueprints\Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $keyAtom = self::getParameter('keyAtom');

        $entity = AtomsManager::load($keyAtom);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
            'statuses' => AtomsStatuses::$list
        ]));

        return $response;
    }
}