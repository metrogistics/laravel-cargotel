<?php

namespace Cargotel\Exceptions;

use Exception;

class ImmutablePropertyException extends Exception
{
    public $property;

    public function __construct($property)
    {
        $this->property = $property;

        parent::__construct('Immutable property: '.$this->property.'.');
    }
}
