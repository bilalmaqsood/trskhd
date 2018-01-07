<?php

namespace App\Providers;

use App\Trskd\Models\Logo;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $header = Logo::where('type' , 'header')->first();
        $footer = Logo::where('type' , 'footer')->first();

        Schema::defaultStringLength(191);
        $months = ['January','February','March','April','May','June','July','August','September','October','November','December'];

        View()->share('months' , $months);
        View()->share('header' , $header);
        View()->share('footer' , $footer);
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
