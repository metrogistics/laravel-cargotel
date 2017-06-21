<?php

namespace Cargotel\ValueTypes;

class StringType extends BaseValueType
{
    protected $default = '';

    public function isValid($value)
    {
        return is_string(''.$value.'');
    }

    public function format($value)
    {
        return ''.$value.'';
    }
}
