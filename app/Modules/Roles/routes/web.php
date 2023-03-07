<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::group(['prefix' => 'roles', 'as' => 'roles.','middleware' => ['auth','setlocale']], function () {

use App\Modules\Roles\controllers\logic\AddRole;
use App\Modules\Roles\controllers\logic\DeleteRole;
use App\Modules\Roles\controllers\logic\UpdateRole;
use App\Modules\Roles\controllers\ShowRolesPage;

Route::group(['prefix' => 'roles', 'as' => 'roles.'], function () {

    Route::get('/', ShowRolesPage::class)->name('index');

    Route::post('store', AddRole::class)->name('store');
    Route::patch('update/{id}', UpdateRole::class)->name('update');
    Route::delete('/{id}', DeleteRole::class)->name('delete');
    
});