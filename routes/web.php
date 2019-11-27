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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/propiedades', 'PropiedadController@propiedad')->name('propiedad');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('propiedad', 'PropiedadController');
    Route::resource('comentario', 'ComentarioController');


    //Manejo de Archivos
    Route::post('archivo/cargar', 'ArchivoController@upload')->name('archivo.upload');
    Route::get('archivo/{archivo}/descargar', 'ArchivoController@download')->name('archivo.download');
    Route::post('archivo/{archivo}/borrar', 'ArchivoController@delete')->name('archivo.delete');
});


Route::get('/inicio', 'PropiedadController@inicio')->name('inicio');
Route::get('/propiedades/{propiedad}', 'PropiedadController@show1')->name('propiedades');
Route::get('/acerca', 'PropiedadController@acerca')->name('acerca');
Route::get('/contacto', 'PropiedadController@contacto')->name('contacto');