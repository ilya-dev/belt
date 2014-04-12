<?php namespace Belt;

abstract class Toolset {

    /**
     * Start a new "chain"
     *
     * @param  mixed $value
     * @return \Belt\Chain
     */
    public function chain($value = null)
    {
        return new Chain($this, $value);
    }

    /**
     * Handle dynamic static calls
     *
     * @param  string $method
     * @param  array  $arguments
     * @return mixed
     */
    public static function __callStatic($method, array $arguments = array())
    {
        $method = \str_replace('_', '', $method);

        return \call_user_func_array([new static, $method], $arguments);
    }

}

