<?php

if ( ! function_exists('cargotel'))
{
    function cargotel()
    {
        return app(\Cargotel\Services\Cargotel::class);
    }
}
