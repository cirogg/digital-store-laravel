<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);

         view()->composer('front.navbar', function ($view) {
            $view->with([
                'categories' => \App\Category::orderBy('name')->get(),
                ]);
        });

       view()->share('categories', \App\Category::all());

       view()->composer('welcome', function ($view) {
        $view->with([
            'products' => \App\Product::where('featured', 1)->orderBy('updated_at')->limit(6)->get(),
            ]);
    });


    }
}
