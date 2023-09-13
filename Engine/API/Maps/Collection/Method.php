<?php

namespace Liloi\Atoms\API\Maps\Collection;

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
        $keyRune = self::getParameter('keyRune');

        $collection = MapsManager::loadFiles($keyRune, $access);

        $filTemplate = __DIR__ . ($access ? '/TemplateTechnomage' : '/TemplateUser') . '.tpl';

        $response = new Response();
        $response->set('render', static::render($filTemplate, [
            'collection' => $collection
        ]));

        return $response;
    }
}