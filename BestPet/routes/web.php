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

Auth::routes(['register'=>false,'reset'=>false]);

Route::get('/home', 'HomeController@index')->name('home');

//------Adopta----//
//Route::get('/adopta','AdoptaController@index');
//Route::get('/adopta/create', 'AdoptaController@create');

Route::resource('adopta', 'AdoptaController')->middleware('auth');

Route::resource('productos', 'ProductosController')->middleware('auth');

Route::resource('animales', 'AnimalesController')->middleware('auth');

Route::resource('citas', 'CitasController')->middleware('auth');

Route::resource('compras', 'ComprasController')->middleware('auth');

Route::resource('guarderia', 'GuarderiaController')->middleware('auth');



