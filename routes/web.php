<?php

use \app\http\middleware\isAdmin;
use \app\http\middleware\isUser;
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

Route::resource('/','FrontendController');
Route::get('category/{id}','FrontendController@product');
Route::get('detail-product/{id}','FrontendController@detail');

Auth::routes();
Auth::routes(['verify' => true]); 

Route::resource('admin','AdminController')->middleware(isAdmin::class);
Route::resource('user','UsersController')->middleware(isUser::class);

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home/getcity/{id}','HomeController@getCity');
Route::get('/home/getkec/{id}','HomeController@getKec');
Route::get('/home/getkel/{id}','HomeController@getKel');
Route::get('Biodata/{id}', 'BiodataController@biodata');
Route::post('updateBio', 'BiodataController@update');
Route::post('updateBio2', 'BiodataController@update2');
Route::post('updateImgBio', 'BiodataController@updateImg');

Route::resource('/kategori', 'KategoriController')->middleware(isAdmin::class);
Route::post('tambahKategori', 'KategoriController@store')->middleware(isAdmin::class);
Route::get('editKategori/{id}', 'KategoriController@edit')->middleware(isAdmin::class);
Route::post('updateKategori/{id}', 'KategoriController@update')->middleware(isAdmin::class);
Route::get('hapusKategori/{id}', 'KategoriController@destroy')->middleware(isAdmin::class);

Route::resource('/product', 'ProductController')->middleware(isUser::class);
Route::post('tambahProduct', 'ProductController@store')->middleware(isUser::class);
Route::get('editProduct/{id}', 'ProcuctController@edit')->middleware(isUser::class);
Route::post('updateProduct/{id}', 'ProductController@update')->middleware(isUser::class);
Route::get('hapusProduct/{id}', 'ProductController@destroy')->middleware(isUser::class);

Route::resource('/penjual', 'PenjualController')->middleware(isUser::class);
Route::get('/product-pending/{id}', 'PenjualController@pending')->middleware(isUser::class);
Route::get('/product-active/{id}', 'PenjualController@active')->middleware(isUser::class);
Route::post('addIklan', 'PenjualController@store')->middleware(isUser::class);
Route::get('editIklan/{id}', 'PenjualController@edit')->middleware(isUser::class);
Route::post('updateIklan/{id}', 'PenjualController@update')->middleware(isUser::class);
Route::get('hapusIklan/{id}', 'PenjualController@destroy')->middleware(isUser::class);
