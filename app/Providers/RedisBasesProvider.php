<?php

namespace App\Providers;

use App\Http\Controllers\Redis\RedisBases;
use Illuminate\Support\ServiceProvider;

class RedisBasesProvider extends ServiceProvider
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
        $this->app->bind('RedisBases',function(){
            return new RedisBases();
        });
    }
}
