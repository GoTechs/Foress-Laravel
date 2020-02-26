<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;

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
        view()->composer('*', function($view){
            $view->with('recentlyAdd', \App\annonce::recentlyAdd());
        });

        view()->composer('*', function($view){
            $view->with('search', \App\categories::allCategory());
        });

        view()->composer('*', function($view){
            $view->with('imageAd', \App\imagead::images());
        });

        if (env('APP_ENV') !== 'local'){
            URL::forceScheme('https');
        }

        Schema::defaultStringLength(191);
    }
}
