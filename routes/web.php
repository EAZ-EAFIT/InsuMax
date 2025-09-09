<?php

use Illuminate\Support\Facades\Route;

$CUSTOMER_CONTROLLER_PATH = 'App\Http\Controllers\CustomerController';
$ITEM_CONTROLLER_PATH = 'App\Http\Controllers\ItemController';
$WISHLIST_CONTROLLER_PATH = 'App\Http\Controllers\WishlistController';

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
Route::get('/wishlist/{id}', $WISHLIST_CONTROLLER_PATH.'@show')->name('wishlist.show');
Route::delete('/wishlist/delete/{id}', $WISHLIST_CONTROLLER_PATH.'@delete')->name('wishlist.delete');