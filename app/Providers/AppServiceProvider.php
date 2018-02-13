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
        view()->composer('partials.header-jumbotron',function($view){
            $view->with("chiesa",auth()->user()->chiesa);
        });
        view()->composer('partials.navbar',function($view){
            $view->with("utente",auth()->user());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
