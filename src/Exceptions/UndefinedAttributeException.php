<?php

namespace Cargotel\Exceptions;

use Exception;

class UndefinedAttributeException extends Exception
{
    public $attribute;

    public function __construct($attribute)
    {
        $this->attribute = $attribute;

        parent::__construct('Undefined attribute: '.$this->attribute.'.');
    }
}
