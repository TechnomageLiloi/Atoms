<?php

namespace Liloi\Atoms\API\Repositories\Collection;

use Liloi\API\Response;
use Liloi\Atoms\API\Method as SuperMethod;
use Liloi\Atoms\Domain\Repositories\Manager;

/**
 * Rune API: Blueprint.Blueprints.Show
 * @package Liloi\Librarium\API\Blueprints\Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $keyMap = self::getParameter('keyMap');

        $collection = Manager::loadByMap($keyMap);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'collection' => $collection
        ]));

        return $response;
    }
}