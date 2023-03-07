<?php
namespace App\Modules\Roles\providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class RolesProvider extends ServiceProvider 
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
        View::addNamespace('Roles', __DIR__ . '/../views');
    }
}
