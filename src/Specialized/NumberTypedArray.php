<?php

namespace Ducatel\PHPCollection\Specialized;

use Ducatel\PHPCollection\TypedArray;

/**
 * Class NumberTypedArray
 * This collection is a specialization of TypedArray for numeric variables.
 *
*@package Ducatel\PHPCollection\Specialized
 */
class NumberTypedArray extends TypedArray
{

    /**
     * NumberTypedArray constructor.
     */
    public function __construct()
    {
        $isNumber = function ($obj) {
            return is_numeric($obj);
        };

        parent::__construct($isNumber);
    }
}
