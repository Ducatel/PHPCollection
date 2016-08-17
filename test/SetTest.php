<?php

namespace Ducatel\PHPCollection\test;

use Ducatel\PHPCollection\Set;

class SetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Ducatel\PHPCollection\Exception\NoDuplicateAllowedException
     */
    public function testInsertDuplicateHasArray()
    {
        $set = new Set();
        $set[] = "plop";
        $set[] = 42;
        $set[] = "plip";
        $set[] = true;
        $set[] = new \stdClass();
        $set[] = "plop";
    }

    /**
     * @expectedException \Ducatel\PHPCollection\Exception\NoDuplicateAllowedException
     */
    public function testInsertDuplicateHasAssociatedArray()
    {
        $set = new Set();
        $set["a"] = "plop";
        $set["a"] = 42;
        $set["b"] = "plop";
        $set["c"] = 42;
    }

    public function testArrayAccess()
    {
        $set = new Set();
        $set["test"] = "plop";
        $this->assertTrue(isset($set["test"]));

        $this->assertTrue($set->contains("plop"));
        $this->assertFalse($set->contains("test"));

        $this->assertEquals("plop", $set["test"]);

        unset($set["test"]);
        $this->assertEquals(0, $set->count());
        $this->assertFalse($set->contains("plop"));
    }
}
