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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Auth::routes(['verify' => true]); 

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/kategori', 'KategoriController');
Route::post('tambahKategori', 'KategoriController@store');
Route::get('editKategori/{id}', 'KategoriController@edit');
Route::post('updateKategori/{id}', 'KategoriController@update');
Route::get('hapusKategori/{id}', 'KategoriController@destroy');

Route::resource('/product', 'ProductController');
Route::post('tambahProduct', 'ProductController@store');
Route::get('editProduct/{id}', 'ProcuctController@edit');
Route::post('updateProduct/{id}', 'ProductController@update');
Route::get('hapusProduct/{id}', 'ProductController@destroy');

Route::resource('/penjual', 'PenjualController');
Route::get('/product-pending', 'PenjualController@pending');
Route::get('/product-active', 'PenjualController@active');
Route::post('addIklan', 'PenjualController@store');
Route::get('editIklan/{id}', 'PenjualController@edit');
Route::post('updateIklan/{id}', 'PenjualController@update');
Route::get('hapusIklan/{id}', 'PenjualController@destroy');