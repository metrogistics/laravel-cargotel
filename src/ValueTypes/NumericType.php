<?php

namespace Cargotel\ValueTypes;

class NumericType extends BaseValueType
{
    protected $default = 0;

    public function isValid($value)
    {
        if(!$value){
            return true;
        }

        return is_numeric($value);
    }

    public function format($value)
    {
        if(!$value){
            return 0;
        }

        return $value * 1;
    }
}
