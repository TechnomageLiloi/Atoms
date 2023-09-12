<?php

namespace Liloi\Atoms;

/**
 * Check phpUnit testing ability.
 */
class CheckTest extends AtomsTest
{
    /**
     * Tests true is indeed true :-)
     */
    public function testCheck()
    {
//        $this->assertTrue(false);
        $this->assertTrue(true);
    }
}