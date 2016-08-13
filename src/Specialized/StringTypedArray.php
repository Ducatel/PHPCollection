<?php

namespace Ducatel\PHPCollection\Specialized;
use Ducatel\PHPCollection\TypedArray;

/**
 * Class StringTypedArray
 * This collection is a specialization of TypedArray for string variables.
 * @package Ducatel\PHPCollection\Specialized
 */
class StringTypedArray extends TypedArray
{
	/**
	 * StringTypedArray constructor.
	 *
	 * @param bool $caseSensitive True if the collection should be case sensitive
	 */
	public function __construct(bool $caseSensitive = true)
	{
		$isStringFct = function ($obj) {
			return is_string($obj);
		};

		if($caseSensitive)
		{
			$isEquals = function ($obj1, $obj2) {
				return (strcmp($obj1, $obj2) == 0);
			};
		}
		else
		{
			$isEquals = function ($obj1, $obj2) {
				return (strcasecmp($obj1, $obj2) == 0);
			};
		}


		parent::__construct($isStringFct, $isEquals);
	}

}