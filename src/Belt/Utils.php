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

}

