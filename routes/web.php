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

Auth::routes();

Route::get('/', 'cartPageController@index');

Route::get('/shop', 'cartPageController@shop');



Route::get('/shop/{name}', 'cartPageController@brandSelect');
Route::get('/cart', 'cartPageController@cart')->name('cart');
Route::post('/addtocart', 'cartPageController@addToCart');
Route::put('/itemRemove/{id}', 'cartPageController@itemRemove');
Route::get('/checkout', 'cartPageController@checkout');

Route::post('/purchase', 'cartPageController@purchase');
Route::get('/product-detail/{id}', 'cartPageController@productDetail');

Route::group(['middleware'=>['auth']],function(){



});

Route::group(['middleware'=>['checkIsAdmin']],function(){

    Route::get('/app/admin', 'Admin\PageController@index');
    Route::get('/app/admin/pre-order', 'Admin\PreOrderController@index')->name('preorder');
    Route::get('/app/admin/pre-order/{id}', 'Admin\PreOrderController@show');
    Route::put('/app/admin/pre-order/{id}', 'Admin\PreOrderController@update');
    Route::put('/app/admin/deliver/{id}', 'Admin\PreOrderController@deliver');
    Route::get('/app/admin/customers', 'Admin\CustomerController@getCustomers');
    Route::resource('/app/admin/brand', 'Admin\BrandController');
    Route::resource('/app/admin/item-code', 'Admin\ItemCodeController');
    Route::resource('/app/admin/stock', 'Admin\StockController');

});