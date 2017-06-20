<?php

namespace Cargotel\Representations;

use Cargotel\Exceptions\ImmutablePropertyException;
use Cargotel\Exceptions\UndefinedAttributeException;

class Representation
{
    protected $attributes = [];

    public function __get($key)
    {
        if(isset($this->attributes['key'])){
            return $this->attributes['key'];
        }

        throw new UndefinedAttributeException($key);
    }

    public function __set($key, $value)
    {
        throw new ImmutablePropertyException($key);
    }
}
