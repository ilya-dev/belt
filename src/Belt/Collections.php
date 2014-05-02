<?php namespace Belt;

use Closure;
use Countable;

class Collections {

    /**
     * Iterate through $collection using $iterator.
     *
     * @param array $collection
     * @param Closure $iterator
     * @return void
     */
    public function each(array $collection, Closure $iterator)
    {
        foreach ($collection as $key => $node)
        {
            $iterator($key, $node);
        }
    }

    /**
     * "Map" through $collection using $iterator.
     *
     * @param array $collection
     * @param Closure $iterator
     * @return array
     */
    public function map(array $collection, Closure $iterator)
    {
        foreach ($collection as $key => $node)
        {
            $collection[$key] = $iterator($key, $node);
        }

        return $collection;
    }

    /**
     * Convert $value to an array.
     *
     * @param mixed $value
     * @return array
     */
    public function toArray($value)
    {
        return (array) $value;
    }

    /**
     * Calculate the size of $value.
     *
     * @param array|Countable $value
     * @return null|integer
     */
    public function size($value)
    {
        if (is_array($value) or ($value instanceof Countable))
        {
            return count($value);
        }

        return null;
    }

    /**
     * "Shuffle" the given $collection.
     *
     * @param array $collection
     * @return array
     */
    public function shuffle(array $collection)
    {
        shuffle($collection);

        return $collection;
    }

    /**
     * Check whether any values in $collection pass $iterator.
     *
     * @param array $collection
     * @param Closure $iterator
     * @return boolean
     */
    public function any(array $collection, Closure $iterator)
    {
        foreach ($collection as $node)
        {
            if ($iterator($node))
            {
                return true;
            }
        }

        return false;
    }

    /**
     * Check whether all values in $collection pass $iterator.
     *
     * @param array $collection
     * @param Closure $iterator
     * @return boolean
     */
    public function all(array $collection, Closure $iterator)
    {
        foreach ($collection as $node)
        {
            if ( ! $iterator($node))
            {
                return false;
            }
        }

        return true;
    }

    /**
     * Run $iterator and remove all failing items in $collection.
     *
     * @param array $collection
     * @param Closure $iterator
     * @return array
     */
    public function reject(array $collection, Closure $iterator)
    {
        foreach ($collection as $key => $node)
        {
            if ( ! $iterator($node))
            {
                unset($collection[$key]);
            }
        }

        return array_values($collection);
    }

    /**
     * Extract an array of values associated with $key from $collection.
     *
     * @param array $collection
     * @param string $key
     * @return array
     */
    public function pluck(array $collection, $key)
    {
        $values = [];

        foreach ($collection as $node)
        {
            if ( ! isset($node[$key]))
            {
                continue;
            }

            $values[] = $node[$key];
        }

        return $values;
    }

    /**
     * Determine if $collection contains $value (=== is used).
     *
     * @param array $collection
     * @param mixed $value
     * @return boolean
     */
    public function contains(array $collection, $value)
    {
        return in_array($value, $collection, true);
    }

    /**
     * Run $function across all elements in $collection.
     *
     * @param array $collection
     * @param string $function
     * @return array
     */
    public function invoke(array $collection, $function)
    {
        return array_map($function, $collection);
    }

    /**
     * Reduce $collection into a single value using $iterator.
     *
     * @param array $collection
     * @param Closure $iterator
     * @param mixed $initial
     * @return mixed
     */
    public function reduce(array $collection, Closure $iterator, $initial = 0)
    {
        foreach ($collection as $node)
        {
            $initial = $iterator($initial, $node);
        }

        return $initial;
    }

    /**
     * Return $collection sorted in ascending order based on $iterator results.
     *
     * @param array $collection
     * @param Closure $iterator
     * @return array
     */
    public function sortBy(array $collection, Closure $iterator)
    {
        $collection = array_map($iterator, $collection);

        sort($collection);

        return array_values($collection);
    }

    /**
     * Group values in $collection by $iterator's return value.
     *
     * @param array $collection
     * @param Closure $iterator
     * @return array
     */
    public function groupBy(array $collection, Closure $iterator)
    {
        $groups = [];

        foreach ($collection as $node)
        {
            $groups[$iterator($node)][] = $node;
        }

        sort($groups);

        return $groups;
    }

    /**
     * Return the maximum value from $collection.
     *
     * @param array $collection
     * @return mixed
     */
    public function max(array $collection)
    {
        sort($collection);

        return end($collection);
    }

    /**
     * Return the minimum value from $collection.
     *
     * @param array $collection
     * @return mixed
     */
    public function min(array $collection)
    {
        sort($collection);

        return reset($collection);
    }

}

