<?php namespace Belt;

class Belt {

    /**
     * The modules you want to use
     *
     * @var array
     */
    protected $modules = [
        'Belt\Arrays',
        'Belt\Collections',
        'Belt\Objects',
        'Belt\Funcs',
        'Belt\Utils',
    ];

    /**
     * The loaded module instances
     *
     * @var array
     */
    protected $instances = [];

    /**
     * Load a module
     *
     * @param  string $module
     * @param  mixed|null $instance
     * @throws \UnexpectedValueException
     * @return mixed
     */
    public function load($module, $instance = null)
    {
        if ( ! \is_null($instance))
        {
            return $this->instances[$module] = $instance;
        }

        if (\in_array($module, $this->modules))
        {
            return $this->instances[$module] = new $module;
        }

        throw new \UnexpectedValueException("Module {$module} does not exist");
    }

    /**
     * Get the list of the modules
     *
     * @return array
     */
    public function getModules()
    {
        return $this->modules;
    }

    /**
     * Determine whether the module was loaded
     *
     * @param  string  $module
     * @return boolean
     */
    public function isLoaded($module)
    {
        return \array_key_exists($module, $this->instances);
    }

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
