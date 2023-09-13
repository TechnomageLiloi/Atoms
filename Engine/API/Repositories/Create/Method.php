<?php

namespace Liloi\Atoms\API\Repositories\Create;

use Liloi\API\Response;
use Liloi\Atoms\API\Method as SuperMethod;
use Liloi\Atoms\Domain\Repositories\Manager as RepositoriesManager;
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

        RepositoriesManager::create($keyMap);
        return new Response();
    }
}