<?php

namespace Cargotel\ValueTypes;

class AnyType extends BaseValueType
{
    protected $default = null;

    public function isValid($value)
    {
        return true;
    }

    public function format($value)
    {
        return $value;
    }
}
