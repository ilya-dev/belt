<?php namespace Belt;

class Functions extends Toolset {

    /**
     * Cached closures
     *
     * @var array
     */
    protected $cached;

    /**
     * Called closures
     *
     * @var array
     */
    protected $called;

    /**
     * "Delayed" closures
     *
     * @var array
     */
    protected $delayed;

    /**
     * The constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->cached  = [];

        $this->called  = [];

        $this->delayed = [];
    }

    /**
     * Execute a closure and cache its output
     *
     * @param  \Closure $closure
     * @return mixed
     */
    public function cache(\Closure $closure)
    {
        $hash = \spl_object_hash($closure);

        if ( ! isset($this->cached[$hash]))
        {
            $this->cached[$hash] = $closure();
        }

        return $this->cached[$hash];
    }

    /**
     * Wrap a closure inside another closure
     *
     * @param  \Closure $closure
     * @param  \Closure $wrapper
     * @return mixed
     */
    public function wrap(\Closure $closure, \Closure $wrapper)
    {
        return $wrapper($closure);
    }

    /**
     * Compose given set of closures
     *
     * @param  array $closures
     * @param  array $arguments
     * @return mixed
     */
    public function compose(array $closures, array $arguments = array())
    {
        $result = \call_user_func_array(\array_shift($closures), $arguments);

        foreach ($closures as $closure)
        {
            $result = $closure($result);
        }

        return $result;
    }

    /**
     * Call a closure only once and ignore next calls
     *
     * @param  \Closure $closure
     * @return void
     */
    public function once(\Closure $closure)
    {
        $hash = \spl_object_hash($closure);

        if ( ! isset($this->called[$hash]))
        {
            $closure();

            $this->called[$hash] = true;
        }
    }

    /**
     * Only call a closure after the exact number of tries
     *
     * @param  integer  $number
     * @param  \Closure $closure
     * @return mixed
     */
    public function after($number, \Closure $closure)
    {
        $hash = \spl_object_hash($closure);

        if (isset($this->delayed[$hash]))
        {
            $closure = $this->delayed[$hash];

            return $closure();
        }

        $this->delayed[$hash] = function() use($number, $closure)
        {
            static $tries = 0;

            $tries += 1;

            if ($tries === $number)
            {
                return $closure();
            }
        };
    }

}

