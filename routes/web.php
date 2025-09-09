<?php

use Illuminate\Support\Facades\Route;

$CUSTOMER_CONTROLLER_PATH = 'App\Http\Controllers\CustomerController';

Route::get('/customer', $CUSTOMER_CONTROLLER_PATH.'@index')->name('customer.index');
Route::get('/customer/create', $CUSTOMER_CONTROLLER_PATH.'@create')->name('customer.create');
Route::post('/customer/save', $CUSTOMER_CONTROLLER_PATH.'@save')->name('customer.save');
Route::get('/customer/{id}', $CUSTOMER_CONTROLLER_PATH.'@show')->name('customer.show');
Route::delete('/customer/delete/{id}', $CUSTOMER_CONTROLLER_PATH.'@delete')->name('customer.delete');
