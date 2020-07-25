<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
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
        View::composer(
            ['frontend.layouts.app', 'frontend.category', 'frontend.search'],
            'App\Http\View\Composers\Frontend\MenuComposer'
        );

        View::composer(
            ['frontend.includes.cart_menu', 'frontend.cart'],
            'App\Http\View\Composers\Frontend\CartComposer'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
