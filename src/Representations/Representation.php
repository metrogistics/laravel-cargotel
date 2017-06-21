<?php

namespace Cargotel\Representations;

use Cargotel\Exceptions\InvalidTypeException;
use Cargotel\Exceptions\ImmutablePropertyException;
use Cargotel\Exceptions\UndefinedAttributeException;

abstract class Representation
{
    protected $attributes = [];

    public function __construct($array_value)
    {
        foreach($this->getValueTypes() as $key => $value){
            try{
                $this->attributes[$key] = $value->set(array_get($array_value, $key, null))->get();
            }catch(InvalidTypeException $e){
                throw new \Exception("Bad value passed to the $key attribute for object of ".static::class);
            }
        }
    }

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

    abstract function getValueTypes();
}
