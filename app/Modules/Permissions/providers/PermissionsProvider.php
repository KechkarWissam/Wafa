<?php
namespace App\Modules\Permissions\providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class PermissionsProvider extends ServiceProvider 
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
        View::addNamespace('Permissions', __DIR__ . '/../views');
    }
}
