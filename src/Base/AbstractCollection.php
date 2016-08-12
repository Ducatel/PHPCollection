<?php

namespace Ducatel\PHPCollection\Base;

abstract class AbstractCollection implements \IteratorAggregate, \Countable
{
    /**
     * @var The array where data are stored internally
     */
    protected $data = [];

    /**
     * Check if an object is present in the collection.
     * The check will be done by `===`
     * @param $objectToFind The object you want to check if it's already present.
     * @return bool True if present else false
     */
    public function contains($objectToFind) : bool
    {
        foreach ($this as $elem) {
            if ($elem === $objectToFind) {
                return true;
            }
        }
        return false;
    }
}
