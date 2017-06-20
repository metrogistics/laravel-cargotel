<?php

namespace Cargotel;

use Cargotel\Services\Cargotel;
use Guzzler\GuzzlerServiceProvider;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;

class CargotelServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/cargotel.php' => config_path('cargotel.php'),
        ]);
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/cargotel.php', 'cargotel'
        );

        $this->app->singleton(Cargotel::class, function(Application $app){
            return new Cargotel(config('cargotel'));
        });

        $this->registerHelpers();
    }

    protected function registerHelpers()
    {
        require_once(__DIR__.'/helpers.php');
    }
}
