<?php

namespace Cargotel\ValueTypes;

class BooleanType extends BaseValueType
{
    protected $default = false;

    public function isValid($value)
    {
        try{
            (bool) $value;
        }catch(\Exception $e){
            return false;
        }

        return true;
    }

    public function format($value)
    {
        if(is_string($value) && strtolower($value) === 'false'){
            return false;
        }

        if(is_string($value) && strtolower($value) === 'y'){
            return true;
        }

        if(is_string($value) && strtolower($value) === 'n'){
            return false;
        }

        return (bool) $value;
    }
}
