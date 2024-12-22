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

Route::get('/', function () {
    return view('welcome');
});


Route::get('home','App\Http\Controllers\Anime@home')->name('home');

Route::get('product_details/{id}','App\Http\Controllers\Anime@product_details')->name('product_details');

Route::get('insert_product','App\Http\Controllers\Anime@insert_product')->name('insert_product');

Route::post('do_insert','App\Http\Controllers\Anime@do_insert')->name('do_insert');

Route::get('product_delete/{id}','App\Http\Controllers\Anime@product_delete')->name('product_delete');

Route::get('edit/{id}','App\Http\Controllers\Anime@edit')->name('edit');

Route::post('do_edit/{id}','App\Http\Controllers\Anime@do_edit')->name('do_edit');

// Route::get('product_delete/{id}','App\Http\Controllers\Anime@product_delete')->name('product_delete');
