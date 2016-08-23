<?php

namespace Ducatel\PHPCollection\Specialized;

use Ducatel\PHPCollection\Base\Traits\StringSpecialization;
use Ducatel\PHPCollection\TypedSet;

/**
 * This class represent a set which contains only string
 *
 * Characteristics:
 *
 *     - Values:string value, duplicates not allowed
 *     - Ordering: No specific order
 *
 * @package Ducatel\PHPCollection
 * @author  D.Ducatel
 */
class StringSet extends TypedSet
{
    use StringSpecialization;
}
