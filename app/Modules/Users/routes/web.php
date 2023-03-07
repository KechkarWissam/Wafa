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


// Route::group(['prefix' => 'users', 'as' => 'users.','middleware' => ['auth','setlocale']], function () {

use App\Modules\Users\controllers\logic\AddUser;
use App\Modules\Users\controllers\logic\DeleteUser;
use App\Modules\Users\controllers\logic\UpdateUser;
use App\Modules\Users\controllers\ShowUsersPage;

Route::group(['prefix' => 'users', 'as' => 'users.'], function () {

    Route::get('/', ShowUsersPage::class)->name('index');

    Route::post('store', AddUser::class)->name('store');
    Route::patch('update/{id}', UpdateUser::class)->name('update');
    Route::delete('/{id}', DeleteUser::class)->name('delete');
    
});