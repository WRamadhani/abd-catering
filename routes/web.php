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

Auth::routes();

Route::middleware(['auth'])->group(function (){
	Route::get('/', 'HomeController@index')->name('home');

	Route::resource('user', 'UserController');
	Route::resource('catering', 'CateringController');
	Route::resource('order', 'OrderController');
	Route::resource('testimoni', 'TestimoniController');

	Route::get('pesan/{nama}', 'OrderController@pesan')->name('pesan');
	Route::POST('pesanan/{nama}', 'OrderController@pesanan')->name('pesanan');
	Route::get('Testimoni/{username}', 'TestimoniController@test')->name('testimoni');
	Route::POST('Testimoni/', 'TestimoniController@testi')->name('testi');

	Route::get('myorder/{username}', 'OrderController@myorder')->name('myorder');


	Route::get('/caterer', 'HomeController@indexCatering');
	Route::get('/home', 'HomeController@indexUser');
});