<?php

namespace App\Providers;

use App\ProductCategories;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Get last five categories for show at index page:
        $categories = ProductCategories::query()->limit(5)->get(['id', 'title']);

        View::share('main_categories', $categories);
        \Illuminate\Database\Schema\Builder::defaultStringLength(191);
    }
}
