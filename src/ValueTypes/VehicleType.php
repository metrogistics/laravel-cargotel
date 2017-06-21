<?php

namespace Cargotel\ValueTypes;

use Cargotel\Representations\Vehicle;

class VehicleType extends BaseValueType
{
    protected $default = null;

    public function isValid($value)
    {
        if(!$value){
            return true;
        }

        if($value instanceof Vehicle){
            return true;
        }

        if(!(is_array($value) || is_object($value))){
            return false;
        }

        return true;
    }

    public function format($value)
    {
        if(!$value){
            return null;
        }

        if($value instanceof Vehicle){
            return $value;
        }

        return new Vehicle((array) $value);
    }
}
