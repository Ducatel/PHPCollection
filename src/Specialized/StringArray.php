<?php

namespace Ducatel\PHPCollection\Specialized;

use Ducatel\PHPCollection\Base\Traits\StringSpecialization;
use Ducatel\PHPCollection\TypedArray;

/**
 * Class StringArray
 * This collection is a specialization of TypedArray for string variables.
 * @package Ducatel\PHPCollection\Specialized
 */
class StringArray extends TypedArray
{
    use StringSpecialization;
}
