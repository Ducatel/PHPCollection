<?php

namespace Ducatel\PHPCollection\test;

use Ducatel\PHPCollection\TypedSet;

class TypedSetTest extends \PHPUnit_Framework_TestCase
{
    public function testInsertDuplicateAddMethod()
    {
        $typeFct = function ($obj) {
            return is_string($obj);
        };

        $set = new TypedSet($typeFct);
        $this->assertEquals(0, $set->count());

        $set->add("plop");
        $this->assertEquals(1, $set->count());
        $this->assertEquals("plop", $set[0]);

        $set->add("plip");
        $this->assertEquals(2, $set->count());

        $this->assertFalse($set->add(42));
        $this->assertFalse($set->add("plip"));
    }

    /**
     * @expectedException \Ducatel\PHPCollection\Exception\NoDuplicateAllowedException
     */
    public function testInsertDuplicateArrayAccess()
    {
        $typeFct = function ($obj) {
            return is_string($obj);
        };

        $set = new TypedSet($typeFct);
        $this->assertEquals(0, $set->count());

        $set[] = "plop";
        $this->assertEquals(1, $set->count());
        $this->assertEquals("plop", $set[0]);
        
        $set[] = "plip";
        $this->assertEquals(2, $set->count());

        $set[] = "plip";
    }
}
