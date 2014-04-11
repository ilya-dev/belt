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

}

