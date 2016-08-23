<?php

namespace Ducatel\PHPCollection\Base\Traits;

/**
 * trait used to define a number specialization
 * Should be used in subclass of AbstractTypedCollection
 * @package Ducatel\PHPCollection\Specialized
 */
trait NumberSpecialization
{

    /**
     * Constructor of Number specialized AbstractTypedCollection
     */
    public function __construct()
    {
        $isNumber = function ($obj) {
            return is_numeric($obj);
        };

        parent::__construct($isNumber);
    }
}
