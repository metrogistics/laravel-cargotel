<?php

namespace Cargotel\ValueTypes;

use Cargotel\Representations\Location;

class LocationType extends BaseValueType
{
    protected $default = false;

    public function __construct($default = null)
    {
        if(!is_null($default)){
            $this->setDefault($default);

            return;
        }

        $this->setDefault(new Location([]));
    }

    public function isValid($value)
    {
        if(!$value){
            return true;
        }

        if($value instanceof Location){
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

        if($value instanceof Location){
            return $value;
        }

        return new Location((array) $value);
    }
}
