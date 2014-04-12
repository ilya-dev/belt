<?php namespace Belt;

class Chain {

    /**
     * The wrapped object
     *
     * @var mixed
     */
    protected $object;

    /**
     * The last value captured
     *
     * @var mixed
     */
    protected $value;

    /**
     * Wrap an object so you can "chain" method calls
     *
     * @param  mixed $object
     * @param  mixed $value
     * @return void
     */
    public function __construct($object, $value = null)
    {
        if ( ! \is_object($object))
        {
            $message = 'An object was expected but got '.\gettype($object);

            throw new \InvalidArgumentException($message);
        }

        $this->object = $object;
        $this->value  = $value;
    }

    /**
     * "Break" the chain and return the last value saved
     *
     * @return mixed
     */
    public function value()
    {
        return $this->value;
    }

    /**
     * Handle dynamic calls
     *
     * @param  string $method
     * @param  array  $arguments
     * @return self
     */
    public function __call($method, array $arguments = array())
    {
        if ( ! \is_null($this->value))
        {
            \array_unshift($arguments, $this->value);
        }

        $this->value = \call_user_func_array([$this->object, $method], $arguments);

        return $this;
    }

}

