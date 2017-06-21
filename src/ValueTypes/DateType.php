<?php

namespace Cargotel\ValueTypes;

use DateTime;
use Carbon\Carbon;

class DateType extends BaseValueType
{
    public function isValid($value)
    {
        if($value instanceof Carbon){
            return true;
        }

        if($value instanceof DateTime){
            return true;
        }

        try{
            Carbon::parse($value);
        }catch(\Exception $e){
            return false;
        }

        return true;
    }

    public function format($value)
    {
        if($value instanceof Carbon){
            return $value;
        }

        if($value instanceof DateTime){
            return Carbon::parse($value->format('c'));
        }

        return Carbon::parse($value);
    }

    public function set($value)
    {
        if(!$value){
            $this->value = null;

            return $this;
        }

        return parent::set($value);
    }
}
