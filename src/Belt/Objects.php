<?php namespace Belt;

class Objects extends Toolset {

    /**
     * Get the names of methods available to the object
     *
     * @param  mixed $object
     * @return array
     */
    public function methods($object)
    {
        $methods = (new \ReflectionClass($object))->getMethods(\ReflectionMethod::IS_PUBLIC);

        return \array_map(function(\ReflectionMethod $method)
        {

            return $method->getName();

        }, $methods);
    }

    /**
     * Determine whether the given value is null
     *
     * @param  mixed $value
     * @return boolean
     */
    public function isNull($value)
    {
        return \is_null($value);
    }

    /**
     * Determine whether the given value is traversable
     *
     * @param  mixed $value
     * @return boolean
     */
    public function isTraversable($value)
    {
        return \is_array($value) or ($value instanceof \Traversable);
    }

    /**
     * Determine whether the given value is an array
     *
     * @param  mixed $value
     * @return boolean
     */
    public function isArray($value)
    {
        return \is_array($value);
    }

    /**
     * Determine whether the given value is an instance of \DateTime
     *
     * @param  mixed $value
     * @return boolean
     */
    public function isDate($value)
    {
        return $value instanceof \DateTime;
    }

    /**
     * Determine whether the given value is a float or an integer
     *
     * @param  mixed $value
     * @return boolean
     */
    public function isNumber($value)
    {
        return \is_integer($value) or \is_float($value);
    }

    /**
     * Determine whether the given value is boolean
     *
     * @param  mixed $value
     * @return boolean
     */
    public function isBoolean($value)
    {
        return \is_bool($value);
    }

    /**
     * Determine whether the given value is a string
     *
     * @param  mixed $value
     * @return boolean
     */
    public function isString($value)
    {
        return \is_string($value);
    }

    /**
     * Determine whether the given value is an instance of \Closure
     *
     * @param  mixed $value
     * @return boolean
     */
    public function isFunction($value)
    {
        return $value instanceof \Closure;
    }

    /**
     * Determine whether the given value is an object
     *
     * @param  mixed $value
     * @return boolean
     */
    public function isObject($value)
    {
        return \is_object($value);
    }

    /**
     * Compare two values using === (strict)
     *
     * @param  mixed $left
     * @param  mixed $right
     * @return boolean
     */
    public function isEqual($left, $right)
    {
        return ($left) === $right;
    }

    /**
     * Determine whether the given value is empty
     *
     * @param  mixed $value
     * @return boolean
     */
    public function isEmpty($value)
    {
        return empty($value);
    }

}

