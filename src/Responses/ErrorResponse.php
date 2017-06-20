<?php

namespace Cargotel\Responses;

class ErrorResponse extends Response
{
    public function __construct($msg = 'Error')
    {
        $this->success = false;
        $this->error = $msg;
    }

    public function getError()
    {
        return $this->error;
    }
}
