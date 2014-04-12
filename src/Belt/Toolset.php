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

}

