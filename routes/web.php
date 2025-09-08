<?php

use Illuminate\Support\Facades\Route;

$CUSTOMER = 'App\Http\Controllers\CustomerController';

Route::get('/customer', $CUSTOMER.'@index')->name('customer.index');
Route::get('/customer/create', $CUSTOMER.'@create')->name('customer.create');
Route::post('/customer/save', $CUSTOMER.'@save')->name('customer.save');
Route::get('/customer/{id}', $CUSTOMER.'@show')->name('customer.show');
Route::delete('/customer/delete/{id}', $CUSTOMER.'@delete')->name('customer.delete');
