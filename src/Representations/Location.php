<?php

namespace Cargotel\Representations;

use Cargotel\ValueTypes\StringType;
use Cargotel\ValueTypes\NumericType;

class Location extends Representation
{
    public function getValueTypes()
    {
        return [
            "name"    => StringType::default(""),
            "zip"     => StringType::default(""),
            "addr1"   => StringType::default(""),
            "addr2"   => StringType::default(""),
            "city"    => StringType::default(""),
            "country" => StringType::default(""),
            "state"   => StringType::default(""),
            "id"      => NumericType::default(0),
        ];
    }
}
