<?php namespace Belt;

class Funcs extends Toolset {

    /**
     * Cached results
     *
     * @var array
     */
    protected $cached;

    /**
     * The constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->cached = [];
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

}

