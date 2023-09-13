<?php

namespace Liloi\Atoms\API\Maps\Show;

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
        $URL = $_SERVER['REQUEST_URI'];
        $keyMap = MapsManager::URLToMap($URL);
        $entity = MapsManager::load($keyMap);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity
        ]));

        return $response;
    }
}