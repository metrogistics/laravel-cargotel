<?php

namespace Cargotel\Representations;

class Order extends Representation
{
    protected $attributes = [
        "status" => "Inactive",
        "customer_name" => "",
        "carrier_name" => "",
        "driver_pay" => 0,
        "due_date" => null,
        "vehicles" => [],
        "order_id" => null,
        "auction_aun_comments" => "",
        "delivered_pickup_date" => null,
        "price" => 0,
        "eta" => null,
        "scheduled_pickup_date" => null,
        "miles" => 0,
        "driver_name" => "",
        "stops" => 0,
        "age" => 0,
        "credit" => null,
        "rate" => 0,
        "central_dispatch_shipment_available_date" => null,
        "order_type" => "Order",
        "no_fee_cc" => false,
        "dispatched_date" => null,
        "on_hold_date" => null,
        "origin" => null,
        "destination" => null,
        "bill_to" => null,
        "carrier_pay" => 0,
        "actual_pickup_date" => null,
        "disp_cmt" => "",
    ];

    public function __construct($order)
    {
        foreach($this->attributes as $key => $value){
            $this->attributes[$key] = array_get($order, $key, $value);
        }
    }
}
