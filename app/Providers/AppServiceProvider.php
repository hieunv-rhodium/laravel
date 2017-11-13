<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//       View composer
        view()->composer('layouts.bottom', function($view){

        $view->with('copyright', \App\Utilities\Copyright::displayNotice());

        });

        //Xem log query
        DB::enableQueryLog();
        DB::listen(function ($query) {

            // $query->sql
            // $query->bindings
            // $query->time
        });


        //share everywhere
//        $value = \App\Utilities\Copyright::displayNotice();
//
//        view()->share('copyright', $value);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
        // ...
    }

}
