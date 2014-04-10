<?php namespace Belt;

class Utils extends Toolset {

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

}

