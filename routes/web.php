<?php

/*
--------------------------------------------------------------------------
 Code developed by Esteban Álvarez, Mateo Pineda, Daniel Arcila
--------------------------------------------------------------------------
*/

use Illuminate\Support\Facades\Route;

$HOME_CONTROLLER_PATH = 'App\Http\Controllers\HomeController';
$ITEM_CONTROLLER_PATH = 'App\Http\Controllers\ItemController';
$WISHLIST_CONTROLLER_PATH = 'App\Http\Controllers\WishlistController';
$PRODUCT_CONTROLLER_PATH = 'App\Http\Controllers\ProductController';
$ORDER_CONTROLLER_PATH = 'App\Http\Controllers\OrderController';
$NOTIFICATION_CONTROLLER_PATH = 'App\Http\Controllers\NotificationController';
$CART_CONTROLLER_PATH = 'App\Http\Controllers\CartController';

Route::get('/', $HOME_CONTROLLER_PATH.'@index')->name('home.index');

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
Route::get('/product-search', $PRODUCT_CONTROLLER_PATH.'@search')->name('product.search');

Route::get('/order', $ORDER_CONTROLLER_PATH.'@index')->name('order.index');
Route::get('/order/create', $ORDER_CONTROLLER_PATH.'@create')->name('order.create');
Route::post('/order/save', $ORDER_CONTROLLER_PATH.'@save')->name('order.save');
Route::get('/order/{id}', $ORDER_CONTROLLER_PATH.'@show')->name('order.show');
Route::delete('/order/delete/{id}', $ORDER_CONTROLLER_PATH.'@delete')->name('order.delete');
Route::post('/order/cancel/{id}', $ORDER_CONTROLLER_PATH.'@cancel')->name('order.cancel');
Route::post('/order/pay/{id}', $ORDER_CONTROLLER_PATH.'@pay')->name('order.pay');

Route::get('/notification', $NOTIFICATION_CONTROLLER_PATH.'@index')->name('notification.index');
Route::get('/notification/create', $NOTIFICATION_CONTROLLER_PATH.'@create')->name('notification.create');
Route::get('/notification/create/search-product', $NOTIFICATION_CONTROLLER_PATH.'@searchProduct')->name('notification.searchProduct');
Route::get('/notification/set/{id}', $NOTIFICATION_CONTROLLER_PATH.'@set')->name('notification.set');
Route::post('/notification/save', $NOTIFICATION_CONTROLLER_PATH.'@save')->name('notification.save');
Route::get('/notification/edit/{id}', $NOTIFICATION_CONTROLLER_PATH.'@edit')->name('notification.edit');
Route::put('/notification/edit/{id}/update', $NOTIFICATION_CONTROLLER_PATH.'@update')->name('notification.update');
Route::delete('/notification/delete/{id}', $NOTIFICATION_CONTROLLER_PATH.'@delete')->name('notification.delete');

Route::get('/cart', $CART_CONTROLLER_PATH.'@index')->name('cart.index');
Route::post('/cart/add/{id}', $CART_CONTROLLER_PATH.'@add')->name('cart.add');
Route::get('/cart/remove/{id}', $CART_CONTROLLER_PATH.'@remove')->name('cart.remove');
Route::get('/cart/removeAll', $CART_CONTROLLER_PATH.'@removeAll')->name('cart.removeAll');

Route::middleware('auth')->group(function () {
    $CART_CONTROLLER_PATH = 'App\Http\Controllers\CartController';
    $ORDER_CONTROLLER_PATH = 'App\Http\Controllers\OrderController';

    Route::get('/cart/checkout', $CART_CONTROLLER_PATH.'@checkout')->name('cart.checkout');
    Route::get('/orders', $ORDER_CONTROLLER_PATH.'@index')->name('order.index');
});

Route::middleware('admin')->group(function () {
    $ADMIN_HOME_CONTROLLER_PATH = 'App\Http\Controllers\Admin\AdminHomeController';
    $ADMIN_PRODUCT_CONTROLLER_PATH = 'App\Http\Controllers\Admin\AdminProductController';
    $ADMIN_WISHLIST_CONTROLLER_PATH = 'App\Http\Controllers\Admin\AdminWishlistController';

    Route::get('/admin', $ADMIN_HOME_CONTROLLER_PATH.'@index')->name('admin.home.index');
    Route::get('/admin/products', $ADMIN_PRODUCT_CONTROLLER_PATH.'@index')->name('admin.product.index');
    Route::get('/admin/products/create', $ADMIN_PRODUCT_CONTROLLER_PATH.'@create')->name('admin.product.create');
    Route::post('/admin/products/store', $ADMIN_PRODUCT_CONTROLLER_PATH.'@store')->name('admin.product.store');
    Route::delete('/admin/products/{id}/delete', $ADMIN_PRODUCT_CONTROLLER_PATH.'@delete')->name('admin.product.delete');
    Route::get('/admin/products/{id}/edit', $ADMIN_PRODUCT_CONTROLLER_PATH.'@edit')->name('admin.product.edit');
    Route::put('/admin/products/{id}/update', $ADMIN_PRODUCT_CONTROLLER_PATH.'@update')->name('admin.product.update');

    Route::get('/admin/wishlists', $ADMIN_WISHLIST_CONTROLLER_PATH.'@index')->name('admin.wishlist.index');
    Route::get('/admin/wishlists/create', $ADMIN_WISHLIST_CONTROLLER_PATH.'@create')->name('admin.wishlist.create');
    Route::post('/admin/wishlists/store', $ADMIN_WISHLIST_CONTROLLER_PATH.'@store')->name('admin.wishlist.store');
    Route::delete('/admin/wishlists/{id}/delete', $ADMIN_WISHLIST_CONTROLLER_PATH.'@delete')->name('admin.wishlist.delete');
    Route::get('/admin/wishlists/{id}/edit', $ADMIN_WISHLIST_CONTROLLER_PATH.'@edit')->name('admin.wishlist.edit');
    Route::put('/admin/wishlists/{id}/update', $ADMIN_WISHLIST_CONTROLLER_PATH.'@update')->name('admin.wishlist.update');
});

Auth::routes();
