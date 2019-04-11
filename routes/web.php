<?php
use App\http\middleware\isAdmin;
use App\http\middleware\isUser;
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
Route::group(['middleware' => isAdmin::class], function () {
	Route::resource('admin','AdminController');
	Route::resource('/kategori', 'KategoriController');
	Route::post('tambahKategori', 'KategoriController@store');
	Route::get('editKategori/{id}', 'KategoriController@edit');
	Route::post('updateKategori/{id}', 'KategoriController@update');
	Route::get('hapusKategori/{id}', 'KategoriController@destroy');
	Route::get('Pengajuan-product', 'PenjualController@admin');
	Route::get('verifikasi-product/{id}', 'PenjualController@verifikasi');
});

Route::group(['middleware' => isUser::class], function () {
	Route::get('Biodata/{id}', 'BiodataController@biodata');
	Route::post('updateBio', 'BiodataController@update');
	Route::post('updateBio2', 'BiodataController@update2');
	Route::post('updateImgBio', 'BiodataController@updateImg');
	Route::resource('/penjual', 'PenjualController');
	Route::get('/product-pending/{id}', 'PenjualController@pending');
	Route::get('/product-active/{id}', 'PenjualController@active');
	Route::post('addIklan', 'PenjualController@store');
	Route::get('detail-product-dashboard/{id}','PenjualController@show');
	Route::post('updateProduct', 'PenjualController@update');
	Route::post('updateImgProduct', 'PenjualController@updateimg');
	Route::resource('user','UsersController');
});	

Route::resource('/','FrontendController');
Route::get('category/{id}','FrontendController@product');
Route::get('detail-product/{id}','FrontendController@detail');
Auth::routes();
Auth::routes(['verify' => true]); 
Route::get('/home/getcity/{id}','HomeController@getCity');
Route::get('/home/getkec/{id}','HomeController@getKec');
Route::get('/home/getkel/{id}','HomeController@getKel');
Route::get('delProduct/{id}', 'PenjualController@destroy');

//Route::resource('user','UsersController')->middleware(isUser::class);

