<?php

namespace Ducatel\PHPCollection\test;

use Ducatel\PHPCollection\TypedArray;

class TypedArrayTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \TypeError
     */
    public function testWithBool()
    {
        $typedArray = new TypedArray(function ($obj) {
            return is_bool($obj);
        });
        $this->assertEquals(0, $typedArray->count());

        $this->assertFalse($typedArray->add("test"));
        $this->assertFalse($typedArray->add(new \stdClass()));

        $this->assertNotFalse($typedArray->add(true));
        $this->assertEquals(1, $typedArray->count());
        $this->assertFalse($typedArray->contains(false));
        $this->assertTrue($typedArray->contains(true));

        $this->assertNotFalse($typedArray->add(false));
        $this->assertEquals(2, $typedArray->count());
        $this->assertTrue($typedArray->contains(false));
        $this->assertTrue($typedArray->contains(true));

        $this->assertFalse($typedArray->delete(42));
        $this->assertFalse($typedArray->delete(6));

        $total = $typedArray->count();
        $typedArray->delete(0);
        $this->assertEquals($total -1, $typedArray->count());

        $typedArray->contains(42);
    }

    /**
     * @expectedException \TypeError
     */
    public function testWithString()
    {
        $typedArray = new TypedArray(function ($obj) {
            return is_string($obj);
        });


        $this->assertFalse($typedArray->add(true));
        $this->assertFalse($typedArray->add(new \stdClass()));
        $this->assertFalse($typedArray->add(42));

        $this->assertNotFalse($typedArray->add('plop'));
        $this->assertFalse($typedArray->contains('123'));
        $this->assertFalse($typedArray->contains('PloP'));
        $this->assertTrue($typedArray->contains('plop'));

        $this->assertNotFalse($typedArray->add("123"));
        $this->assertTrue($typedArray->contains('123'));
        $this->assertTrue($typedArray->contains('plop'));

        $typedArray->contains(42);
    }

    /**
     * @expectedException \TypeError
     */
    public function testWithObject()
    {
        $mockBuilder = $this->getMockBuilder('\PDO')->disableOriginalConstructor();
        $typedArray = new TypedArray('\PDO');
        $this->assertNotFalse($typedArray->add($mockBuilder->getMock()));

        $this->assertFalse($typedArray->add(true));
        $this->assertFalse($typedArray->add(new \stdClass()));
        $this->assertFalse($typedArray->add(42));

        $typedArray->delete('plpo');
    }

    public function testWithObjectImplementEquatable()
    {
        $mock = $this->getMockBuilder('Ducatel\PHPCollection\Base\Equatable')
            ->setMockClassName("testClass")
            ->getMock();
        $mock->method('equals')
            ->willReturn(true);

        $typedArray = new TypedArray('testClass');
        $this->assertNotFalse($typedArray->add($mock));
        $this->assertFalse($typedArray->add(true));
        $this->assertFalse($typedArray->add(new \stdClass()));
        $this->assertFalse($typedArray->add(42));
    }

    public function testWithCustomEqualsFunction()
    {
        $isStringFct = function ($obj) {
            return is_string($obj);
        };
        $isEquals = function ($obj1, $obj2) {
            return (strcasecmp($obj1, $obj2) == 0);
        };
        $typedArray = new TypedArray($isStringFct, $isEquals);

        $this->assertFalse($typedArray->add(true));
        $this->assertFalse($typedArray->add(new \stdClass()));
        $this->assertFalse($typedArray->add(42));

        $this->assertNotFalse($typedArray->add('plop'));
        $this->assertFalse($typedArray->contains('123'));
        $this->assertTrue($typedArray->contains('plop'));
        $this->assertTrue($typedArray->contains('PloP'));
    }

    /**
     * @expectedException \TypeError
     */
    public function testArrayAccessFunctions()
    {
        $isStringFct = function ($obj) {
            return is_string($obj);
        };
        $isEquals = function ($obj1, $obj2) {
            return (strcasecmp($obj1, $obj2) == 0);
        };

        $stringArray = new TypedArray($isStringFct, $isEquals);

        $stringArray[] = "plip";
        $this->assertTrue(isset($stringArray[0]));
        $this->assertEquals("plip", $stringArray[0]);

        $stringArray[] = "plap";
        $this->assertEquals("plap", $stringArray[1]);

        $this->assertFalse($stringArray->contains('123'));
        $this->assertTrue($stringArray->contains('plip'));
        $this->assertTrue($stringArray->contains('plap'));

        $stringArray[0] = "plop";

        $this->assertFalse($stringArray->contains('123'));
        $this->assertFalse($stringArray->contains('plip'));
        $this->assertTrue($stringArray->contains('plap'));
        $this->assertTrue($stringArray->contains('plop'));


        unset($stringArray[1]);

        $this->assertFalse($stringArray->contains('plip'));
        $this->assertFalse($stringArray->contains('plap'));
        $this->assertTrue($stringArray->contains('plop'));


        $stringArray[] = true;
    }

    public function testUsageAssociativeArray()
    {
        $isStringFct = function ($obj) {
            return is_string($obj);
        };
        $isEquals = function ($obj1, $obj2) {
            return (strcasecmp($obj1, $obj2) == 0);
        };

        $stringArray = new TypedArray($isStringFct, $isEquals);

        $stringArray["plop"] = "plip";
        $this->assertTrue(isset($stringArray["plop"]));
        $this->assertTrue($stringArray->contains("plip"));

        $stringArray->add("plap", "ploup");
        $this->assertTrue($stringArray->contains("plap"));

        $stringArray->add("updated", "ploup");
        $this->assertEquals("updated", $stringArray["ploup"]);
    }

    /**
     * @expectedException \TypeError
     */
    public function testBadTypeInFirstParamConstructor()
    {
        new TypedArray(42, null);
    }

    /**
     * @expectedException \TypeError
     */
    public function testBadTypeInSecondParamConstructor()
    {
        new TypedArray('\PDO', "plop");
    }
}
