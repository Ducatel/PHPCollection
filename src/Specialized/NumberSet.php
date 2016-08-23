<?php

namespace Ducatel\PHPCollection\Specialized;

use Ducatel\PHPCollection\Base\Traits\NumberSpecialization;
use Ducatel\PHPCollection\TypedSet;

/**
 * This class represent a set which contains only number
 *
 * Characteristics:
 *
 *     - Values: numeric value, duplicates not allowed
 *     - Ordering: No specific order
 *
 * @package Ducatel\PHPCollection
 * @author  D.Ducatel
 */
class NumberSet extends TypedSet
{
    use NumberSpecialization;
}
