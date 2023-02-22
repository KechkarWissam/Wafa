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


// Route::group(['prefix' => 'products', 'as' => 'products.','middleware' => ['auth','setlocale']], function () {

use App\Modules\Products\controllers\logic\DeleteProduct;
use App\Modules\Products\controllers\logic\AddProduct;
use App\Modules\Products\controllers\logic\UpdateProduct;
use App\Modules\Products\controllers\ShowProductsPage;

Route::group(['prefix' => 'products', 'as' => 'products.'], function () {

    Route::get('/', ShowProductsPage::class)->name('index');

    Route::post('store', AddProduct::class)->name('store');
    Route::patch('update/{id}', UpdateProduct::class)->name('update');
    Route::delete('/{id}', DeleteProduct::class)->name('delete');
    
});