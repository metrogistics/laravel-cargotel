<?php

namespace Cargotel\Representations;

use Cargotel\ValueTypes\DateType;
use Cargotel\ValueTypes\StringType;
use Cargotel\ValueTypes\VehicleType;
use Cargotel\ValueTypes\BooleanType;
use Cargotel\ValueTypes\NumericType;
use Cargotel\ValueTypes\LocationType;

class Order extends Representation
{
    public function getValueTypes()
    {
        return [
            "status"                                   => StringType::default("Inactive"),
            "customer_name"                            => StringType::default(""),
            "carrier_name"                             => StringType::default(""),
            "driver_pay"                               => NumericType::default(0),
            "due_date"                                 => DateType::default(null),
            "vehicles"                                 => VehicleType::default(null),
            "order_id"                                 => NumericType::default(0),
            "auction_aun_comments"                     => StringType::default(""),
            "delivered_pickup_date"                    => DateType::default(null),
            "price"                                    => NumericType::default(0),
            "eta"                                      => DateType::default(null),
            "scheduled_pickup_date"                    => DateType::default(null),
            "miles"                                    => NumericType::default(0),
            "driver_name"                              => StringType::default(""),
            "stops"                                    => NumericType::default(0),
            "age"                                      => NumericType::default(0),
            "credit"                                   => StringType::default(""),
            "rate"                                     => NumericType::default(0),
            "central_dispatch_shipment_available_date" => DateType::default(null),
            "order_type"                               => StringType::default("Order"),
            "no_fee_cc"                                => BooleanType::default(false),
            "dispatched_date"                          => DateType::default(null),
            "on_hold_date"                             => DateType::default(null),
            "origin"                                   => LocationType::default(null),
            "destination"                              => LocationType::default(null),
            "bill_to"                                  => LocationType::default(null),
            "carrier_pay"                              => NumericType::default(0),
            "actual_pickup_date"                       => DateType::default(null),
            "disp_cmt"                                 => StringType::default(""),
        ];
    }
}
