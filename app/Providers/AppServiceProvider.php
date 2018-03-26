<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(120);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //configurar carpte publica en el servidor
        /* $this->app->bind('path.public', function() {
                     return base_path().'/../public_html';
                 });*/
    }
}
