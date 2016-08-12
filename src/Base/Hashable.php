<?php

namespace Ducatel\PHPCollection\Base;

/**
 * Interface Hashable
 * This interface imposes that object can be represent by an hash code.
 * @package Ducatel\PHPCollection\Base
 * @author D.Ducatel
 */
interface Hashable
{

    /**
     * Returns a hash code value for the object. This method is supported for the benefit of hash tables such as those provided by HashMap.
     * The general contract of hashCode is:
     *  - Whenever it is invoked on the same object more than once during an execution of a application, the hashCode method must consistently return the same value, provided no information used in equals comparisons on the object is modified. This integer need not remain consistent from one execution of an application to another execution of the same application.
     *  - If two objects are equal according to the equals(Object) method, then calling the hashCode method on each of the two objects must produce the same integer result.
     *  - It is not required that if two objects are unequal according to the equals method, then calling the hashCode method on each of the two objects must produce distinct results. However, the programmer should be aware that producing distinct integer results for unequal objects may improve the performance of hash tables.
     *
     * @return string hash code value for this object.
     */
    public function hashCode() : string;
}
