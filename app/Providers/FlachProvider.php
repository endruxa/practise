<?php

namespace App\Providers;

use App\Classes\Flach;
/*use App\Classes\Flash;*/
use Illuminate\Support\ServiceProvider;

class FlachProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('flach', function(){
           return new Flach();
        });
    }
}
