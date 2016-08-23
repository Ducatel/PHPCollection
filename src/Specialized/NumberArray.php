<?php

namespace Ducatel\PHPCollection\Specialized;

use Ducatel\PHPCollection\Base\Traits\NumberSpecialization;
use Ducatel\PHPCollection\TypedArray;

/**
 * Class NumberArray
 * This collection is a specialization of TypedArray for numeric variables.
 *
*@package Ducatel\PHPCollection\Specialized
 */
class NumberArray extends TypedArray
{
    use NumberSpecialization;
}
