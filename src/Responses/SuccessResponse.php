<?php

namespace Cargotel\Responses;

class SuccessResponse extends Response
{
    public function __construct($msg = 'Success')
    {
        $this->success = true;
        $this->data = ['msg' => $msg];
    }

    public function getMessage()
    {
        return $this->data['msg'];
    }
}
