<?php

use Illuminate\Support\Facades\Route;

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

Route::get('orders/{id}/order', 'OrdersController@order');
Route::post('orders/storeOrder', 'OrdersController@storeOrder');
Route::resource('orders', 'OrdersController');
Route::get('/', 'DashboardController@index');
