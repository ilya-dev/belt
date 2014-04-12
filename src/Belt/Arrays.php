<?php namespace Belt;

class Arrays extends Toolset {

    /**
     * Get the first n elements
     *
     * @param  array   $elements
     * @param  integer $amount
     * @return mixed|array
     */
    public function first(array $elements, $amount = 1)
    {
        $elements = \array_slice($elements, 0, $amount);

        return \count($elements) == 1 ? \reset($elements) : $elements;
    }

    /**
     * Exclude the last n elements
     *
     * @param  array   $elements
     * @param  integer $amount
     * @return array
     */
    public function initial(array $elements, $amount = 1)
    {
        return \array_slice($elements, 0, \count($elements) - $amount);
    }

    /**
     * Get the rest of the array elements
     *
     * @param  array   $elements
     * @param  integer $index
     * @return array
     */
    public function rest(array $elements, $index = 1)
    {
        return \array_slice($elements, $index);
    }

    /**
     * Get the last n elements
     *
     * @param  array   $elements
     * @param  integer $amount
     * @return mixed|array
     */
    public function last(array $elements, $amount = 1)
    {
        $elements = \array_slice($elements, \count($elements) - $amount);

        return \count($elements) == 1 ? \reset($elements) : $elements;
    }

    /**
     * Remove falsy values
     *
     * @param  array $elements
     * @return array
     */
    public function pack(array $elements)
    {
        return \array_values(\array_filter($elements));
    }

    /**
     * "Flatten" an array
     *
     * @param  array $elements
     * @return array
     */
    public function flatten(array $elements)
    {
        $level = [];

        foreach ($elements as $node)
        {
            if (\is_array($node))
            {
                $level = \array_merge($level, $this->flatten($node));
            }
            else
            {
                $level[] = $node;
            }
        }

        return $level;
    }

    /**
     * Create an array containing a range of elements
     *
     * @param  int $to
     * @param  int $from
     * @param  int $step
     * @return array
     */
    public function range($to, $from = 0, $step = 1)
    {
        return \range($from, $to, $step);
    }

    /**
     * Compute the difference between the two
     *
     * @param  array $one
     * @param  array $another
     * @return array
     */
    public function difference(array $one, array $another)
    {
        return \array_values(\array_diff($one, $another));
    }

    /**
     * Remove duplicated values
     *
     * @param  array         $elements
     * @param  \Closure|null $iterator
     * @return array
     */
    public function unique(array $elements, \Closure $iterator = null)
    {
        if ( ! is_null($iterator))
        {
            $elements = \array_filter($elements, $iterator);
        }
        else
        {
            $elements = \array_unique($elements);
        }

        return \array_values($elements);
    }

    /**
     * Remove all instances of $ignore found in $elements (=== used)
     *
     * @param  array $elements
     * @param  array $ignore
     * @return array
     */
    public function without(array $elements, array $ignore)
    {
        foreach ($elements as $key => $node)
        {
            if (\in_array($node, $ignore)) unset($elements[$key]);
        }

        return \array_values($elements);
    }

}

