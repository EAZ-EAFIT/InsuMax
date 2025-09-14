<?php

use Illuminate\Support\Facades\Route;

$HOME_CONTROLLER_PATH = 'App\Http\Controllers\HomeController';
$CUSTOMER_CONTROLLER_PATH = 'App\Http\Controllers\CustomerController';
$ITEM_CONTROLLER_PATH = 'App\Http\Controllers\ItemController';
$WISHLIST_CONTROLLER_PATH = 'App\Http\Controllers\WishlistController';
$PRODUCT_CONTROLLER_PATH = 'App\Http\Controllers\ProductController';

Route::get('/', $HOME_CONTROLLER_PATH.'@index')->name('home.index');

Route::get('/customer', $CUSTOMER_CONTROLLER_PATH.'@index')->name('customer.index');
Route::get('/customer/create', $CUSTOMER_CONTROLLER_PATH.'@create')->name('customer.create');
Route::post('/customer/save', $CUSTOMER_CONTROLLER_PATH.'@save')->name('customer.save');
Route::get('/customer/{id}', $CUSTOMER_CONTROLLER_PATH.'@show')->name('customer.show');
Route::delete('/customer/delete/{id}', $CUSTOMER_CONTROLLER_PATH.'@delete')->name('customer.delete');

Route::get('/item', $ITEM_CONTROLLER_PATH.'@index')->name('item.index');
Route::get('/item/create', $ITEM_CONTROLLER_PATH.'@create')->name('item.create');
Route::post('/item/save', $ITEM_CONTROLLER_PATH.'@save')->name('item.save');
Route::get('/item/{id}', $ITEM_CONTROLLER_PATH.'@show')->name('item.show');
Route::delete('/item/delete/{id}', $ITEM_CONTROLLER_PATH.'@delete')->name('item.delete');

Route::get('/wishlist', $WISHLIST_CONTROLLER_PATH.'@index')->name('wishlist.index');
Route::get('/wishlist/create', $WISHLIST_CONTROLLER_PATH.'@create')->name('wishlist.create');
Route::post('/wishlist/save', $WISHLIST_CONTROLLER_PATH.'@save')->name('wishlist.save');
Route::post('/wishlist/addProduct', $WISHLIST_CONTROLLER_PATH.'@addProduct')->name('wishlist.addProduct');
Route::delete('/wishlist/deleteProduct', $WISHLIST_CONTROLLER_PATH.'@deleteProduct')->name('wishlist.deleteProduct');
Route::get('/wishlist/addOptions/{productId}', $WISHLIST_CONTROLLER_PATH.'@addOptions')->name('wishlist.addOptions');
Route::get('/wishlist/{id}', $WISHLIST_CONTROLLER_PATH.'@show')->name('wishlist.show');
Route::delete('/wishlist/delete/{id}', $WISHLIST_CONTROLLER_PATH.'@delete')->name('wishlist.delete');

Route::get('/product', $PRODUCT_CONTROLLER_PATH.'@index')->name('product.index');
Route::get('/product/{id}', $PRODUCT_CONTROLLER_PATH.'@show')->name('product.show');

Route::middleware('admin')->group(function () {
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name('admin.home.index');
    Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name('admin.product.index');
    Route::post('/admin/products/store', 'App\Http\Controllers\Admin\AdminProductController@store')->name('admin.product.store');
    Route::delete('/admin/products/{id}/delete', 'App\Http\Controllers\Admin\AdminProductController@delete')->name('admin.product.delete');
    Route::get('/admin/products/{id}/edit', 'App\Http\Controllers\Admin\AdminProductController@edit')->name('admin.product.edit');
    Route::put('/admin/products/{id}/update', 'App\Http\Controllers\Admin\AdminProductController@update')->name('admin.product.update');
});

Auth::routes();



// Rutas de prueba para Notification
Route::get('/test', $PRODUCT_CONTROLLER_PATH.'@test')->name('notification.create');
Route::get('/test/{id}', $PRODUCT_CONTROLLER_PATH.'@test2')->name('notification.set');
Route::post('/test/confirmation', $PRODUCT_CONTROLLER_PATH.'@test3')->name('notification.save');
Route::get('/verNotifs', $PRODUCT_CONTROLLER_PATH.'@test4')->name('notification.index');
Route::get('/edit', $PRODUCT_CONTROLLER_PATH.'@test5')->name('notification.edit');