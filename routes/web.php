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

Route::get('products/upload', function(){
  return view('products.upload');
})->name('products.upload');

Route::get('cadetes/upload', function(){
  return view('cadetes.upload');
})->name('cadetes.upload');

Route::post('clients/import', 'ClientController@import')->name('clients.import');
Route::post('products/import', 'ProductController@import')->name('products.import');
Route::post('cadetes/import', 'CadeteController@import')->name('cadetes.import');

Route::resources([
  'clients' => 'ClientController',
  'products' => 'ProductController',
  'cadetes' => 'CadeteController'
]);
