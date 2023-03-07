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

use App\Modules\Permissions\controllers\ShowPermissionsByRole;
use App\Modules\Permissions\controllers\ShowPermissionsPage;

Route::group(['prefix' => 'permissions', 'as' => 'permissions.'], function () {

    Route::get('', ShowPermissionsPage::class)->name('index');
    Route::get('/{role}',ShowPermissionsByRole::class)->name('permission.role');

});