<?php

namespace Ducatel\PHPCollection;

use Ducatel\PHPCollection\Exception\NoDuplicateAllowedException;

/**
 * This class represent a set which contains only one type of object.
 *
 * Characteristics:
 *
 *     - Values: Typed value, duplicates not allowed
 *     - Ordering: No specific order
 *
 * @package Ducatel\PHPCollection
 * @author  D.Ducatel
 */
class TypedSet extends TypedArray
{
    /**
     * Add an object to this collection
     *
     * @param object $object The object you want to add
     *
     * @param null|object $key The key where object will be stored. Null if you won't to use this as associative array
     *
     * @return True when added with success. False if you try to add a duplicate or if the type is not valid
     */
    public function add($object, $key = null)
    {
        try {
            if ($this->contains($object)) {
                return false;
            }
        } catch (\TypeError $e) {
            return false;
        }


        return parent::add($object, $key);
    }

    /**
     * Offset to set
     *
     * @link  http://php.net/manual/en/arrayaccess.offsetset.php
     *
     * @param mixed $offset The offset to assign the value to.
     * @param mixed $value  The value to set.
     *
     * @throws NoDuplicateAllowedException When try to add an object already added
     * @throws \TypeError When try to add type not managed by this collection
     * @thows
     * @since 5.0.0
     */
    public function offsetSet($offset, $value)
    {
        if ($this->contains($value)) {
            throw new NoDuplicateAllowedException("Object already inserted");
        }

        parent::offsetSet($offset, $value);
    }
}
