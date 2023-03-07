<?php
namespace App\Modules\Users\providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class UsersProvider extends ServiceProvider 
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
        View::addNamespace('Users', __DIR__ . '/../views');
    }
}
