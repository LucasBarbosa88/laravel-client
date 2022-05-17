<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth', 'needsRole:admin'], 'prefix' => 'admin'], function () {
	Route::get('/clients', 'Admin\ClientController@index')->name('clients');
	Route::post('client/create', 'Admin\ClientController@store');
	Route::put('client/edit/{ID}', 'Admin\ClientController@edit');
	Route::post('client/update', 'Admin\ClientController@update');
	Route::get('client/delete/{ID}', 'Admin\ClientController@destroy');
});