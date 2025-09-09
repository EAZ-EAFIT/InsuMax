<?php

use Illuminate\Support\Facades\Route;

$CUSTOMER = 'App\Http\Controllers\CustomerController';
$ITEM = 'App\Http\Controllers\ItemController';

Route::get('/customer', $CUSTOMER.'@index')->name('customer.index');
Route::get('/customer/create', $CUSTOMER.'@create')->name('customer.create');
Route::post('/customer/save', $CUSTOMER.'@save')->name('customer.save');
Route::get('/customer/{id}', $CUSTOMER.'@show')->name('customer.show');
Route::delete('/customer/delete/{id}', $CUSTOMER.'@delete')->name('customer.delete');

Route::get('/item', $ITEM.'@index')->name('item.index');
Route::get('/item/create', $ITEM.'@create')->name('item.create');
Route::post('/item/save', $ITEM.'@save')->name('item.save');
Route::get('/item/{id}', $ITEM.'@show')->name('item.show');
Route::delete('/item/delete/{id}', $ITEM.'@delete')->name('item.delete');
