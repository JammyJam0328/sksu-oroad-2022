<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('destination', function ($campus_id) {
            return auth()->user()->campus_id == $campus_id;
        });

        Blade::if('requestIsPending', function ($status_id) {
            return $status_id == 1;
        });

    }
}
