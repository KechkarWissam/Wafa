<?php
namespace App\Modules\ProductCategories\providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ProductCategoriesProvider extends ServiceProvider 
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        View::addNamespace('ProductCategories', __DIR__ . '/../views');
    }
}
