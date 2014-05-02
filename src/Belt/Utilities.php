<?php namespace Belt;

class Utilities {

    /**
     * Generate a unique indentifier
     *
     * @param  string $prefix
     * @return string
     */
    public function id($prefix = '')
    {
        return $prefix.\uniqid('', true);
    }

    /**
     * Escape all HTML entities in a string
     *
     * @param  string $string
     * @return string
     */
    public function escape($string)
    {
        return \htmlentities($string, ENT_QUOTES, 'UTF-8', false);
    }

    /**
     * Return the same value passed as the argument
     *
     * @param  mixed $value
     * @return mixed
     */
    public function with($value)
    {
        return $value;
    }

    /**
     * Invoke a $closure $number of times
     *
     * @param  integer  $number
     * @param  \Closure $closure
     * @return void
     */
    public function times($number, \Closure $closure)
    {
        foreach (\range(1, $number) as $index)
        {
            $closure();
        }
    }

}

