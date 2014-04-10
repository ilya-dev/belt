<?php namespace Belt;

abstract class Toolset {

    /**
     * Start a new "chain"
     *
     * @return \Belt\Chain
     */
    public function chain()
    {
        return new Chain($this);
    }

}

