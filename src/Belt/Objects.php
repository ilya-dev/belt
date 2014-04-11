<?php namespace Belt;

class Objects extends Toolset {

    /**
     * Determine whether the given value is null
     *
     * @param  mixed $value
     * @return boolean
     */
    public function isNull($value)
    {
        return \is_null($value);
    }

}

