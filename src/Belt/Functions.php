<?php namespace Belt;

use Closure;

class Functions {

    /**
     * The cached closures.
     *
     * @var array
     */
    protected $cached = [];

    /**
     * The called closures.
     *
     * @var array
     */
    protected $called = [];

    /**
     * The "delayed" closures.
     *
     * @var array
     */
    protected $delayed = [];

    /**
     * Execute $closure and cache its output.
     *
     * @param Closure $closure
     * @return mixed
     */
    public function cache(Closure $closure)
    {
        $hash = spl_object_hash($closure);

        if ( ! isset ($this->cached[$hash]))
        {
            $this->cached[$hash] = $closure();
        }

        return $this->cached[$hash];
    }

    /**
     * Wrap $closure inside $wrapper.
     *
     * @param Closure $closure
     * @param Closure $wrapper
     * @return mixed
     */
    public function wrap(Closure $closure, Closure $wrapper)
    {
        return $wrapper($closure);
    }

    /**
     * Compose the given set of closures.
     *
     * @param array $closures
     * @param array $arguments
     * @return mixed
     */
    public function compose(array $closures, array $arguments = [])
    {
        $result = call_user_func_array(array_shift($closures), $arguments);

        foreach ($closures as $closure)
        {
            $result = $closure($result);
        }

        return $result;
    }

    /**
     * Execute $closure only once and ignore future calls.
     *
     * @param Closure $closure
     * @return void
     */
    public function once(Closure $closure)
    {
        $hash = spl_object_hash($closure);

        if ( ! isset ($this->called[$hash]))
        {
            $closure();

            $this->called[$hash] = true;
        }
    }

    /**
     * Only execute $closure after the exact $number of failed tries.
     *
     * @param integer $number
     * @param Closure $closure
     * @return mixed
     */
    public function after($number, Closure $closure)
    {
        $hash = spl_object_hash($closure);

        if (isset ($this->delayed[$hash]))
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

