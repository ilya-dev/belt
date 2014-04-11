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

}

