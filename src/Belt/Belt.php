<?php namespace Belt;

class Belt {

    /**
     * The modules you want to use.
     *
     * @var array
     */
    protected $modules = [
        'Belt\Arrays',
        'Belt\Collections',
        'Belt\Objects',
        'Belt\Functions',
        'Belt\Utilities',
    ];

    /**
     * The loaded module instances.
     *
     * @var array
     */
    protected $instances = [];

    /**
     * Load a module.
     *
     * @throws \UnexpectedValueException
     * @param string $module
     * @param mixed|null $instance
     * @return mixed
     */
    public function load($module, $instance = null)
    {
        if ( ! \is_null($instance))
        {
            if ( ! $this->hasModule($module))
            {
                $this->addModule($module);
            }

            return ($this->instances[$module] = $instance);
        }

        if ($this->hasModule($module))
        {
            return ($this->instances[$module] = new $module);
        }

        throw new \UnexpectedValueException("Module {$module} does not exist");
    }

    /**
     * Determine whether the module exists.
     *
     * @param string $module
     * @return boolean
     */
    public function hasModule($module)
    {
        return \in_array($module, $this->modules);
    }

    /**
     * Add a new module.
     *
     * @param string $module
     * @return void
     */
    public function addModule($module)
    {
        $this->modules[] = $module;
    }

    /**
     * Get all modules.
     *
     * @return array
     */
    public function getModules()
    {
        return $this->modules;
    }

    /**
     * Determine whether a module was loaded.
     *
     * @param string $module
     * @return boolean
     */
    public function isLoaded($module)
    {
        return \array_key_exists($module, $this->instances);
    }

    /**
     * Load a module (if not yet) and return its instance.
     *
     * @param string $module
     * @return mixed
     */
    public function getInstance($module)
    {
        if ( ! $this->isLoaded($module))
        {
            $this->load($module);
        }

        return $this->instances[$module];
    }

    /**
     * Determine whether the given object has a method.
     *
     * @param mixed $object
     * @param string $method
     * @return boolean
     */
    public function hasMethod($object, $method)
    {
        return (new \ReflectionClass($object))->hasMethod($method);
    }

    /**
     * Run a method and return its output.
     *
     * @throws \BadMethodCallException
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public function run($name, array $arguments = [])
    {
        foreach ($this->getModules() as $module)
        {
            $instance = $this->getInstance($module);

            if ($this->hasMethod($instance, $name))
            {
                return \call_user_func_array([$instance, $name], $arguments);
            }
        }

        throw new \BadMethodCallException("Method {$name} does not exist");
    }

    /**
     * Handle a dynamic method call.
     *
     * @param string $method
     * @param array $arguments
     * @return mixed
     */
    public function __call($method, array $arguments = array())
    {
        return \call_user_func_array([$this, 'run'], [$method, $arguments]);
    }

    /**
     * Handle a dynamic static call.
     *
     * @param string $method
     * @param array $arguments
     * @return mixed
     */
    public static function __callStatic($method, array $arguments = array())
    {
        return \call_user_func_array([new static, $method], $arguments);
    }

}

