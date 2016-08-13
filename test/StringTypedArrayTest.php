<?php

namespace Ducatel\PHPCollection\Test;


use Ducatel\PHPCollection\Specialized\StringTypedArray;

class StringTypedArrayTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @expectedException \TypeError
	 */
	public function testCaseSensitive()
	{
		$typedArray = new StringTypedArray();

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
	public function testCaseInSensitive()
	{
		$typedArray = new StringTypedArray(false);

		$this->assertFalse($typedArray->add(true));
		$this->assertFalse($typedArray->add(new \stdClass()));
		$this->assertFalse($typedArray->add(42));

		$this->assertNotFalse($typedArray->add('plop'));
		$this->assertFalse($typedArray->contains('123'));
		$this->assertTrue($typedArray->contains('PloP'));
		$this->assertTrue($typedArray->contains('plop'));

		$this->assertNotFalse($typedArray->add("123"));
		$this->assertTrue($typedArray->contains('123'));
		$this->assertTrue($typedArray->contains('plop'));

		$typedArray->contains(42);
	}
}
