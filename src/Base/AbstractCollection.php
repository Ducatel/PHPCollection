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

    /**
     * Count elements of an object
     *
     * @link  http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     *        </p>
     *        <p>
     *        The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        return count($this->data);
    }


    /**
     * Retrieve an external iterator
     *
     * @link  http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return \Traversable An instance of an object implementing <b>Iterator</b> or
     *        <b>Traversable</b>
     * @since 5.0.0
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->data);
    }
}
