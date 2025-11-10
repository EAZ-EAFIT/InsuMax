<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

$PRODUCT_API_CONTROLLER_PATH = 'App\Http\Controllers\Api\ProductApiController';

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/products', $PRODUCT_API_CONTROLLER_PATH.'@index')->name('api.product.index');
Route::get('/products/paginate', $PRODUCT_API_CONTROLLER_PATH.'@paginate')->name('api.product.paginate');
