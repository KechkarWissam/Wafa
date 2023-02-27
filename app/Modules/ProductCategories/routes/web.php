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


// Route::group(['prefix' => 'productcategories', 'as' => 'productcategories.','middleware' => ['auth','setlocale']], function () {

use App\Modules\ProductCategories\controllers\logic\DeleteProductCategory;
use App\Modules\ProductCategories\controllers\logic\AddProductCategory;
use App\Modules\ProductCategories\controllers\logic\UpdateProductCategory;
use App\Modules\ProductCategories\controllers\ShowProductCategoriesPage;

Route::group(['prefix' => 'productcategories', 'as' => 'productcategories.'], function () {

    Route::get('/', ShowProductCategoriesPage::class)->name('index');

    Route::post('store', AddProductCategory::class)->name('store');
    Route::patch('update/{id}', UpdateProductCategory::class)->name('update');
    Route::delete('/{id}', DeleteProductCategory::class)->name('delete');
    
});