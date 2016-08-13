<?php

namespace Ducatel\PHPCollection;

/**
 * Class Specialized
 * This class represent a array which can contains only one type of object.
 * Characteristics:
 *
 *     - Keys: consequentially numbered, without gaps
 *     - Values: anything, duplicates allowed
 *     - Ordering: same as input unless when explicitly sorted
 *
 * @package Ducatel\PHPCollection
 * @author  D.Ducatel
 */
class TypedArray extends Base\AbstractTypedCollection implements \ArrayAccess
{
    /**
     * Add an object to this collection
     *
     * @param object $object The object you want to add
     *
     * @return True when added with success, else false
     */
    public function add($object)
    {
        if (call_user_func($this->validateTypeFct, $object) === false) {
            return false;
        }

        $this->data[] = $object;
        return true;
    }

    /**
     * Add an object to this collection
     *
     * @param Integer $key The key (index) of object in the collection.
     *
     * @return false|object The deleted object or false if not found
     * @throws \TypeError Throw when key is not an integer
     */
    public function delete($key)
    {
        if (is_integer($key) === false) {
            throw new \TypeError("The key must be an integer");
        }

        $result = array_splice($this->data, $key, 1);
        if (count($result) == 0) {
            return false;
        }

        return $result[0];
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

    /**
     * Whether a offset exists
     *
     * @link  http://php.net/manual/en/arrayaccess.offsetexists.php
     *
     * @param mixed $offset <p>
     *                      An offset to check for.
     *                      </p>
     *
     * @return boolean true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     * @since 5.0.0
     */
    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    /**
     * Offset to retrieve
     *
     * @link  http://php.net/manual/en/arrayaccess.offsetget.php
     *
     * @param mixed $offset <p>
     *                      The offset to retrieve.
     *                      </p>
     *
     * @return mixed Can return all value types.
     * @since 5.0.0
     */
    public function offsetGet($offset)
    {
        return $this->data[$offset];
    }

    /**
     * Offset to set
     *
     * @link  http://php.net/manual/en/arrayaccess.offsetset.php
     *
     * @param mixed $offset The offset to assign the value to.
     * @param mixed $value  The value to set.
     *
     * @throws \TypeError When try to add type not managed by this collection
     * @since 5.0.0
     */
    public function offsetSet($offset, $value)
    {
        if (call_user_func($this->validateTypeFct, $value) === false) {
            throw new \TypeError("Object cannot be added. Type not managed by this collection");
        }

        if (is_null($offset)) {
            $this->data[] = $value;
        } else {
            $this->data[$offset] = $value;
        }
    }

    /**
     * Offset to unset
     *
     * @link  http://php.net/manual/en/arrayaccess.offsetunset.php
     *
     * @param mixed $offset <p>
     *                      The offset to unset.
     *                      </p>
     *
     * @return void
     * @since 5.0.0
     */
    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }
}
