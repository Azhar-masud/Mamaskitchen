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

Route::get('/','HomeController@index')->name('welcome'); 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('reservation','ReservationController@reserv')->name('reserv');

Route::group(['prefix'=>'admin','middleware'=>'auth','namespace'=>'admin'], function(){
	Route::get('dashboard', 'dashboardController@index')->name('admin.dashboard');
	Route::resource('slider', 'sliderController');
	Route::resource('category', 'CategoryController');
	Route::resource('item', 'ItemController');
	Route::get('reservation','ReservationController@index')->name('reservation.index');
	Route::post('reservation/{id}','ReservationController@status')->name('reservation.status');
	Route::delete('reservation/{id}','ReservationController@destroy')->name('reservation.destroy');
});

