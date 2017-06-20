<?php

namespace Cargotel\Facades;

use Illuminate\Support\Facades\Facade;

class Cargotel extends Facade
{
    protected static function getFacadeAccessor()
    {
        return static::$app[\Cargotel\Services\Cargotel::class];
    }
}
