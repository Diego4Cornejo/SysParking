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

Route::resource('/', "HomeController@index");
Route::get('ingreso', "PagesController@ingreso");

//Route::get('inicio', "PagesController@inicio");
Route::get('graficos', "PagesController@graficos");
Route::get('reportes', "PagesController@reportes");
Route::get('consulta', "PagesController@consulta");
Route::get('registrarabonado', "PagesController@registrarabonado");
Route::get('listadeabonados', "PagesController@listadeabonados");
Route::get('pagodeabonados', "PagesController@pagodeabonados");
Route::get('operadores', "PagesController@operadores");
Route::get('caja', "PagesController@caja");
Route::get('home', function () {
    return view('Layouts.home');
});
Route::resource('ingreso',"EstacionadosController");
Route::resource('inicio',"InicioController");
Route::resource('abonados',"AbonadosController");


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
