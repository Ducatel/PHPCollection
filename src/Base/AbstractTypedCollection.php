<?php

namespace Ducatel\PHPCollection\Base;

abstract class AbstractTypedCollection extends AbstractCollection
{
    /**
     * @var \Closure The function used to check if an object is belongs to the type of this collection
     * This function must take one argument and return true when args is in valid type (false otherwise)
     */
    private $validateTypeFct;

    /**
     * @var \Closure The function used to check if two object are equals
     * This function must take two arguments and return true when arguments are equals (false otherwise)
     */
    private $equalsFct;

    /**
     * AbstractTypedCollection constructor.
     *
     * @param string|\Closure $type Two value are possible for this field.
     *  1. The class name of object you want to store in this collection
     *  2. A function which take one arguments and return true when it in the good type (false otherwise)
     * @param null|\Closure $equalsFct When you pass null, the object will use the function \Equatable::equals if exist, else use the ===
     *                                 When you pass a Closure, the function must take two arguments and return true when 2 arguments are equals
     */
    public function __construct($type, $equalsFct = null)
    {
        if (is_callable($type)) {
            $this->validateTypeFct = $type;
        } else {
            $this->validateTypeFct = function ($object) use ($type) {
                return ($object instanceof $type);
            };
        }

        if ($equalsFct === null) {
            if (is_callable($type)) {
                $this->equalsFct = function ($obj1, $obj2) {
                    return $obj1 === $obj2;
                };
            } else {
                $this->equalsFct = function ($obj1, $obj2) {
                    return $obj1->equals($obj2);
                };
            }
        } else {
            $this->equalsFct = $equalsFct;
        }
    }

    /**
     * Check if an object can be manage by the current collection
     * @param $object The object you want to test
     * @return bool True if can be added false otherwise
     */
    public function validateType($object) : bool
    {
        return (call_user_func($this->validateTypeFct, $object) === true);
    }

    /**
     * Check if two object are equals
     * @param $object1 First object you want to compare to
     * @param $object2 Second object you want to compare
     * @return bool True if objects are equals false otherwise
     */
    private function checkEquality($object1, $object2) : bool
    {
        return (call_user_func($this->equalsFct, $object1, $object2) === true);
    }

    /**
     * Check if an object is present in the collection.
     * The check will be done by `Equatable::equals()` method if exist else use `===`
     *
     * @param $objectToFind The object you want to check if it's already present.
     *
     * @return bool True if present else false
     * @throws \TypeError When object in parameter is not good
     */
    public function contains($objectToFind) : bool
    {
        if ($this->validateType($objectToFind) === false) {
            throw new \TypeError("Object in parameter is not an instance of a good class");
        }

        foreach ($this as $elem) {
            if ($this->checkEquality($elem, $objectToFind)) {
                return true;
            }
        }
        return false;
    }
}
