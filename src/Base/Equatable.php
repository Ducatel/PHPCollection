<?php

namespace Ducatel\PHPCollection\Base;

/**
 * Interface Equatable
 * This interface imposes that object can equality checked.
 * @package Ducatel\PHPCollection\Base
 * @author D.Ducatel
 */
interface Equatable
{
    /**
     * Indicates whether some other object is "equal to" this one.
     * @param $object The reference object with which to compare.
     * @return bool true if this object is the same as the obj argument; false otherwise.
     */
    public function equals($object) : bool;
}
