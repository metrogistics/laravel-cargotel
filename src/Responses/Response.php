<?php

namespace Cargotel\Responses;

class Response
{
    public $success = false;
    public $data = null;
    public $error = null;

    public static function success($msg = 'Success')
    {
        return new SuccessResponse($msg);
    }

    public static function error($msg = 'Error')
    {
        return new ErrorResponse($msg);
    }
}
