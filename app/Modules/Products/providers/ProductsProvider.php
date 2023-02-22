<?php
namespace App\Modules\Products\providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ProductsProvider extends ServiceProvider 
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
        View::addNamespace('Products', __DIR__ . '/../views');
    }
}
