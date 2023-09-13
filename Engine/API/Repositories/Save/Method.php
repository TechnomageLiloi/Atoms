<?php

namespace Liloi\Atoms\API\Repositories\Save;

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
        $keyAtom = self::getParameter('keyAtom');
        $entity = Manager::load($keyAtom);

        $entity->setTitle(self::getParameter('title'));
        $entity->setSummary(self::getParameter('summary'));
        $entity->setGlobal(self::getParameter('global'));
        $entity->setLocal(self::getParameter('local'));
        $entity->setStatus(self::getParameter('status'));

        $entity->save();

        return new Response();
    }
}