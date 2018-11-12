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
Route::resource('graficos', "ChartsController");


//Auth::routes();
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Email Verification Routes...
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::get('/home', 'HomeController@index')->name('home');

