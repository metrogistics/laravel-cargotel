<?php

return [
    'username' => env('CARGOTEL_USERNAME'),
    'password' => env('CARGOTEL_PASSWORD'),
    'base_uri' => env('CARGOTEL_BASE_URI'),
    'services_url' => env('CARGOTEL_SERVICES_URL', 'cargotel/services.mcgi'),
];
