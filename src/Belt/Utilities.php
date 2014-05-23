<?php
namespace Belt;

class Utilities
{
    /**
     * Generate a unique identifier.
     *
     * @param string $prefix
     * @return string
     */
    public function id($prefix = '')
    {
        return uniqid($prefix, true);
    }

    /**
     * Escape all HTML entities in a string.
     *
     * @param string $string
     * @return string
     */
    public function escape($string)
    {
        return htmlentities($string, ENT_QUOTES, 'UTF-8', false);
    }

    /**
     * Return the value passed as the first argument.
     *
     * @param mixed $value
     * @return mixed
     */
    public function with($value)
    {
        return $value;
    }

    /**
     * Invoke a $closure $number of times.
     *
     * @param integer $number
     * @param callable $closure
     * @return void
     */
    public function times($number, callable $closure)
    {
        foreach (range(1, $number) as $index) {
            $closure();
        }
    }
}