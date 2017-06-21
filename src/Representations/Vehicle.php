<?php

namespace Cargotel\Representations;

use Cargotel\ValueTypes\StringType;
use Cargotel\ValueTypes\BooleanType;
use Cargotel\ValueTypes\NumericType;

class Vehicle extends Representation
{
    public function getValueTypes()
    {
        return [
            "num_keys" => NumericType::default(0),
            "bay_location" => StringType::default(""),
            "inop" => BooleanType::default(false),
            "license_number" => StringType::default(""),
            "year" => NumericType::default(0),
            "model" => StringType::default(""),
            "sub_model" => StringType::default(""),
            "odometer" => NumericType::default(0),
            "cons_ref" => StringType::default(""),
            "make" => StringType::default(""),
            "color" => StringType::default(""),
            "flag_keys" => BooleanType::default(false),
            "vin" => StringType::default(""),
            "lessee" => StringType::default(""),
            "size" => NumericType::default(1),
        ];
    }
}
