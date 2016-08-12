<?php

namespace Ducatel\PHPCollection\Base;

/**
 * Interface Comparable
 * This interface imposes a total ordering on the objects of each class that implements it.
 * This ordering is referred to as the class's natural ordering, and the class's compareTo method is referred to as its natural comparison method.
 * @package Ducatel\PHPCollection\Base
 * @author D.Ducatel
 */
interface Comparable
{

    /**
     * Compares this object with the specified object for order.
     * @param $object The object to be compared.
     * @return int A negative integer, zero, or a positive integer as this object is less than, equal to, or greater than the specified object.
     * @throws \InvalidArgumentException If object in parameter is not the same type as this object
     */
    public function compareTo($object) : int;
}
