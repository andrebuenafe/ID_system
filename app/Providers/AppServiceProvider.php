<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
<<<<<<< HEAD
    {
=======
    {   
>>>>>>> 0e7da61e8986a5b15ddd65ebec425e990a09b921
        Schema::defaultStringLength(191);
    }
    
}
