<?php

use Illuminate\Support\Facades\Route;

$PRODUCT_CONTROLLER_PATH = 'App\Http\Controllers\ProductController';

Route::get('/products', $PRODUCT_CONTROLLER_PATH.'@index')->name('product.index');
Route::get('/products/{id}', $PRODUCT_CONTROLLER_PATH.'@show')->name('product.show');
