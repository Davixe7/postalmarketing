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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('clients/upload', function(){
  return view('clients.upload');
})->name('clients.upload');
Route::post('clients/import', 'ClientController@import')->name('clients.import');
Route::resource('clients', 'ClientController');
Route::resource('cadetes', 'CadeteController');
