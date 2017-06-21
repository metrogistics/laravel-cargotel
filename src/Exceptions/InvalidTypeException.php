<?php

namespace Cargotel\Exceptions;

use Exception;

class InvalidTypeException extends Exception
{
    public function __construct()
    {
        parent::__construct('Invalid value type passed.');
    }
}
