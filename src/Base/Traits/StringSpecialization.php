<?php

namespace Ducatel\PHPCollection\Base\Traits;

/**
 * trait used to define a string specialization
 * Should be used in subclass of AbstractTypedCollection
 * @package Ducatel\PHPCollection\Specialized
 */
trait StringSpecialization
{
    /**
     * Constructor of string specialized AbstractTypedCollection
     *
     * @param bool $caseSensitive True if the collection should be case sensitive
     */
    public function __construct(bool $caseSensitive = true)
    {
        $isStringFct = function ($obj) {
            return is_string($obj);
        };

        if ($caseSensitive) {
            $isEquals = function ($obj1, $obj2) {
                return (strcmp($obj1, $obj2) == 0);
            };
        } else {
            $isEquals = function ($obj1, $obj2) {
                return (strcasecmp($obj1, $obj2) == 0);
            };
        }


        parent::__construct($isStringFct, $isEquals);
    }
}
