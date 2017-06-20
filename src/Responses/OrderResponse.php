<?php

namespace Cargotel\Responses;

use Cargotel\Representations\Order;

class OrderResponse extends SuccessResponse
{
    public function __construct($order_response)
    {
        parent::__construct();

        $this->data = new Order($order_response);
    }
}
