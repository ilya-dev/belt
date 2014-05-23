<?php
namespace Belt;

use ReflectionClass;
use ReflectionMethod;
use Traversable;
use DateTime;

class Objects
{
    /**
     * Invoke $closure on $object, then return $object.
     *
     * @param mixed $object
     * @param callable $closure
     * @return mixed
     */
    public static function apply($object, callable $closure)
    {
        $closure($object);

        return $object;
    }

    /**
     * Determine whether the given object has a key.
     *
     * @param mixed $object
     * @param string $key
     * @return boolean
     */
    public static function has($object, $key)
    {
        return in_array($key, self::keys($object));
    }

    /**
     * Get the keys.
     *
     * @param mixed $object
     * @return array
     */
    public static function keys($object)
    {
        return array_keys((array)$object);
    }

    /**
     * Get the values.
     *
     * @param mixed $object
     * @return array
     */
    public static function values($object)
    {
        return array_values((array)$object);
    }

    /**
     * Copy all properties from $source to $destination.
     *
     * @param mixed $source
     * @param mixed $destination
     * @return mixed
     */
    public static function extend($source, $destination)
    {
        foreach ($source as $key => $value) {
            $destination->{$key} = $value;
        }

        return $destination;
    }

    /**
     * Fill in any missing values using $defaults.
     *
     * @param mixed $object
     * @param mixed $defaults
     * @return mixed
     */
    public static function defaults($object, $defaults)
    {
        if (is_array($defaults)) {
            foreach ($defaults as $default) {
                self::defaults($object, $default);
            }

            return $object;
        }

        foreach ($defaults as $key => $value) {
            if (!property_exists($object, $key)) {
                $object->{$key} = $value;
            }
        }

        return $object;
    }

    /**
     * Return a copy of $value.
     *
     * @param mixed $value
     * @return mixed
     */
    public static function copy($value)
    {
        return is_object($value) ? (clone $value) : $value;
    }

    /**
     * Get the names of all public methods.
     *
     * @param mixed $object
     * @return array
     */
    public static function methods($object)
    {
        $methods = (new ReflectionClass($object))->getMethods(ReflectionMethod::IS_PUBLIC);

        $iterator = function (ReflectionMethod $method) {
            return $method->getName();
        };

        return array_map($iterator, $methods);
    }

    /**
     * Determine whether the given value is null.
     *
     * @param mixed $value
     * @return boolean
     */
    public static function isNull($value)
    {
        return is_null($value);
    }

    /**
     * Determine whether the given value is traversable.
     *
     * @param mixed $value
     * @return boolean
     */
    public static function isTraversable($value)
    {
        return is_array($value) or ($value instanceof Traversable);
    }

    /**
     * Determine whether the given value is an array.
     *
     * @param mixed $value
     * @return boolean
     */
    public static function isArray($value)
    {
        return is_array($value);
    }

    /**
     * Determine whether the given value is an instance of \DateTime.
     *
     * @param mixed $value
     * @return boolean
     */
    public static function isDate($value)
    {
        return ($value instanceof DateTime);
    }

    /**
     * Determine whether the given value is a float or an integer.
     *
     * @param mixed $value
     * @return boolean
     */
    public static function isNumber($value)
    {
        return is_integer($value) or is_float($value);
    }

    /**
     * Determine whether the given value is a boolean.
     *
     * @param mixed $value
     * @return boolean
     */
    public static function isBoolean($value)
    {
        return is_bool($value);
    }

    /**
     * Determine whether the given value is a string.
     *
     * @param mixed $value
     * @return boolean
     */
    public static function isString($value)
    {
        return is_string($value);
    }

    /**
     * Determine whether the given value is an instance of \Closure.
     *
     * @param mixed $value
     * @return boolean
     */
    public static function isFunction($value)
    {
        return is_callable($value);
    }

    /**
     * Determine whether the given value is an object.
     *
     * @param mixed $value
     * @return boolean
     */
    public static function isObject($value)
    {
        return is_object($value);
    }

    /**
     * Compare two values using === (strict mode).
     *
     * @param mixed $left
     * @param mixed $right
     * @return boolean
     */
    public static function isEqual($left, $right)
    {
        return ($left) === $right;
    }

    /**
     * Determine whether the given value is empty.
     *
     * @param mixed $value
     * @return boolean
     */
    public static function isEmpty($value)
    {
        return empty($value);
    }
}