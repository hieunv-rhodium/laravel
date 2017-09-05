<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
//        view()->composer('layouts.bottom', function($view){
//
//        $view->with('copyright', \App\Utilities\Copyright::displayNotice());
//
//        });

        //share everywhere
        $value = \App\Utilities\Copyright::displayNotice();

        view()->share('copyright', $value);

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
