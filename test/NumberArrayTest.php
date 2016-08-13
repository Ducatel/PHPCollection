<?php

namespace Ducatel\PHPCollection\test;

use Ducatel\PHPCollection\Specialized\NumberArray;

class NumberTypedArrayTest extends \PHPUnit_Framework_TestCase
{

    public function testStdUsage()
    {
        $typedArray = new NumberArray();

        $this->assertTrue($typedArray->add(42));
        $this->assertTrue($typedArray->add(123.12));
        $this->assertTrue($typedArray->add("123"));
        $this->assertTrue($typedArray->add("123.12"));


        $this->assertFalse($typedArray->add(true));
        $this->assertFalse($typedArray->add(new \stdClass()));


        $this->assertTrue($typedArray->contains(42));
        $this->assertTrue($typedArray->contains(123.12));
    }
}
