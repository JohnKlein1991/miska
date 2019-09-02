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

Route::get('/', 'SiteController@index')
    ->name('main');
Route::get('/contacts', function (){
    return view('site.contacts');
})->name('contacts');
Route::get('/delivery', function (){
    return view('site.delivery');
})->name('delivery');



Route::get('/add-to-cart/{id}', 'Site\CartController@addToCart')->name('cart.add');
Route::get('/remove-from-cart/{id}', 'Site\CartController@removeFromCart')->name('cart.remove');
Route::get('/remove-all-by-id-from-cart/{id}', 'Site\CartController@removeAllByIdFromCart')->name('cart.removeAllById');
Route::get('/show-cart', 'Site\CartController@showCart')->name('cart.show');

Route::get('/order-form', 'Site\OrderController@showForm')->name('order.form');
Route::post('/order-form', 'Site\OrderController@placeOrder')->name('order.place');

Route::get('/goods/item/{id}','Site\GoodsController@showItem')->name('goods.item');
Route::get('/goods/group/{category}','Site\GoodsController@showCategory')->name('goods.category');
