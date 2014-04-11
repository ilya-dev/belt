<?php namespace Belt;

class Collections {

    /**
     * Iterate through a collection
     *
     * @param  array    $collection
     * @param  \Closure $iterator
     * @return void
     */
    public function each(array $collection, \Closure $iterator)
    {
        foreach ($collection as $key => $node)
        {
            $iterator($key, $node);
        }
    }

    /**
     * "Map" through a collection
     *
     * @param  array    $collection
     * @param  \Closure $iterator
     * @return array
     */
    public function map(array $collection, \Closure $iterator)
    {
        foreach ($collection as $key => $node)
        {
            $collection[$key] = $iterator($key, $node);
        }

        return $collection;
    }

    /**
     * Convert a value to an array
     *
     * @param  mixed $value
     * @return array
     */
    public function toArray($value)
    {
        return (array) $value;
    }

    /**
     * Get the "size" of a given value
     *
     * @param  array|\Countable $value
     * @return null|integer
     */
    public function size($value)
    {
        if (\is_array($value) or ($value instanceof \Countable))
        {
            return \count($value);
        }

        return null;
    }

    /**
     * "Shuffle" an array
     *
     * @param  array $collection
     * @return array
     */
    public function shuffle(array $collection)
    {
        \shuffle($collection);

        return $collection;
    }

    /**
     * Whether any values in the $collection pass the $iterator
     *
     * @param  array    $collection
     * @param  \Closure $iterator
     * @return boolean
     */
    public function any(array $collection, \Closure $iterator)
    {
        foreach ($collection as $element)
        {
            if ($iterator($element))
            {
                return true;
            }
        }

        return false;
    }

    /**
     * Whether all values in $collection pass the truth test ($iterator)
     *
     * @param  array    $collection
     * @param  \Closure $iterator
     * @return boolean
     */
    public function all(array $collection, \Closure $iterator)
    {
        foreach ($collection as $node)
        {
            if ( ! $iterator($node)) return false;
        }

        return true;
    }

    /**
     * Extract an array of values associated with the $key
     *
     * @param  array  $collection
     * @param  string $key
     * @return array
     */
    public function pluck(array $collection, $key)
    {
        $values = [];

        foreach ($collection as $node)
        {
            if ( ! isset($node[$key])) continue;

            $values[] = $node[$key];
        }

        return $values;
    }

    /**
     * Determine if the collection contains a given value (strict check)
     *
     * @param  array $collection
     * @param  mixed $value
     * @return boolean
     */
    public function contains(array $collection, $value)
    {
        foreach ($collection as $node)
        {
            if (($node) === $value) return true;
        }

        return false;
    }

    /**
     * Run $function across all elements in $collection
     *
     * @param  array  $collection
     * @param  string $function
     * @return array
     */
    public function invoke(array $collection, $function)
    {
        return \array_map($function, $collection);
    }

}

