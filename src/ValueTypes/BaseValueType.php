<?php

namespace Cargotel\ValueTypes;

use Cargotel\Exceptions\InvalidTypeException;

abstract class BaseValueType
{
    protected $value;

    protected $default;

    public function __construct($default = null)
    {
        if(!is_null($default)){
            $this->setDefault($default);
        }
    }

    public static function default($value)
    {
        return new static($value);
    }

    public function set($value)
    {
        if($value === null){
            $this->value = null;

            return $this;
        }

        $this->validate($value);

        $this->value = $this->format($value);

        return $this;
    }

    public function setDefault($value)
    {
        $this->validate($value);

        $this->default = $this->format($value);

        return $this;
    }

    abstract public function isValid($value);

    abstract public function format($value);

    public function get()
    {
        if(is_null($this->value)){
            return $this->default;
        }

        return $this->value;
    }

    public function validate($value)
    {
        try{
            if(!$this->isValid($value)){
                throw new InvalidTypeException();
            }
        }catch(\Exception $e){
            throw new InvalidTypeException();
        }

        return $this;
    }
}
