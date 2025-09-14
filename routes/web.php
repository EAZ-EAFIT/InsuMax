<?php

use Illuminate\Support\Facades\Route;

$HOME_CONTROLLER_PATH = 'App\Http\Controllers\HomeController';
$CUSTOMER_CONTROLLER_PATH = 'App\Http\Controllers\CustomerController';
$ITEM_CONTROLLER_PATH = 'App\Http\Controllers\ItemController';
$WISHLIST_CONTROLLER_PATH = 'App\Http\Controllers\WishlistController';
$PRODUCT_CONTROLLER_PATH = 'App\Http\Controllers\ProductController';
$ORDER_CONTROLLER_PATH = 'App\Http\Controllers\OrderController';

Route::get('/', $HOME_CONTROLLER_PATH.'@index')->name('home.index');

Route::get('/customer', $CUSTOMER_CONTROLLER_PATH.'@index')->name('customer.index');
Route::get('/customer/create', $CUSTOMER_CONTROLLER_PATH.'@create')->name('customer.create');
Route::post('/customer/save',$CUSTOMER_CONTROLLER_PATH.'@save')->name('customer.save');
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

Route::get('/order', $ORDER_CONTROLLER_PATH.'@index')->name('order.index');
Route::get('/order/create', $ORDER_CONTROLLER_PATH.'@create')->name('order.create');
Route::post('/order/save', $ORDER_CONTROLLER_PATH.'@save')->name('order.save');
Route::get('/order/{id}', $ORDER_CONTROLLER_PATH.'@show')->name('order.show');
Route::delete('/order/delete/{id}', $ORDER_CONTROLLER_PATH.'@delete')->name('order.delete');
Route::post('/order/cancel/{id}', $ORDER_CONTROLLER_PATH.'@cancel')->name('order.cancel');
Route::post('/order/pay/{id}', $ORDER_CONTROLLER_PATH.'@pay')->name('order.pay');
