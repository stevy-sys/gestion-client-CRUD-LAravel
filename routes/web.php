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

Route::view('/', 'welcome');
Route::view('a-propos', 'a-propos');

/*Route::get('clients', 'ClientsController@index');
Route::get('clients/create/', 'ClientsController@create');
Route::post('clients', 'ClientsController@store');
Route::get('clients/{client}', 'ClientsController@show');
Route::get('clients/{client}/edit', 'ClientsController@edit');
Route::patch('clients/{client}', 'ClientsController@update');
Route::delete('clients/{client}', 'ClientsController@destroy');*/
Route::resource('clients', 'ClientsController');


Route::get('contact', 'ContactControlleur@create')->name('contact.create');
Route::post('contact', 'ContactControlleur@store')->name('contact.store');
Auth::routes();
