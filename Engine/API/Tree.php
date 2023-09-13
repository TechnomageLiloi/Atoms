<?php

namespace Liloi\Atoms\API;

use Liloi\API\Manager;
use Liloi\API\Method;

/**
 * @inheritDoc
 */
class Tree
{
    private static ?self $instance = null;

    private Manager $manager;

    private function __construct(Manager $manager)
    {
        $this->manager = $manager;
    }

    public static function getInstance(): self
    {
        if(self::$instance === null)
        {
            $manager = new Manager();

            $manager->add(new Method('Atoms.Maps.Remove', '\Liloi\Atoms\API\Maps\Remove\Method::execute'));
            $manager->add(new Method('Atoms.Maps.Show', '\Liloi\Atoms\API\Maps\Show\Method::execute'));
            $manager->add(new Method('Atoms.Maps.Edit', '\Liloi\Atoms\API\Maps\Edit\Method::execute'));
            $manager->add(new Method('Atoms.Maps.Save', '\Liloi\Atoms\API\Maps\Save\Method::execute'));
            $manager->add(new Method('Atoms.Maps.Collection', '\Liloi\Atoms\API\Maps\Collection\Method::execute'));

            $manager->add(new Method('Atoms.Repositories.Create', '\Liloi\Atoms\API\Repositories\Create\Method::execute'));
            $manager->add(new Method('Atoms.Repositories.Remove', '\Liloi\Atoms\API\Repositories\Remove\Method::execute'));
            $manager->add(new Method('Atoms.Repositories.Edit', '\Liloi\Atoms\API\Repositories\Edit\Method::execute'));
            $manager->add(new Method('Atoms.Repositories.Save', '\Liloi\Atoms\API\Repositories\Save\Method::execute'));
            $manager->add(new Method('Atoms.Repositories.Collection', '\Liloi\Atoms\API\Repositories\Collection\Method::execute'));

            self::$instance = new self($manager);
        }

        return self::$instance;
    }

    public function execute(): string
    {
        $response = $this->manager->search($_POST['method'])->execute($_POST['parameters'] ?? []);
        return $response->asJson();
    }
}