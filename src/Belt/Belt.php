<?php namespace Belt;

class Belt {

    /**
     * The loaded modules
     *
     * @var array
     */
    protected $modules = [];

    /**
     * Run a method and return the output
     *
     * @param  string $name
     * @param  array  $arguments
     * @return mixed
     */
    public function run($name, array $arguments = array())
    {

    }

    /**
     * Handle dynamic calls
     *
     * @param  string $method
     * @param  array  $arguments
     * @return mixed
     */
    public static function __callStatic($method, array $arguments = array())
    {
        $callable = [new static, 'run'];

        return \call_user_func_array($callable, [$method, $arguments]);
    }

}
