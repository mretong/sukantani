<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    if(Auth::check())
    	return redirect('/home');
    else
    	return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::post('/home', [
	'as'	=> 'kontinjen-post',
	'uses'	=> 'HomeController@kontinjenPost'
]);

// PESERTA

Route::get('/peserta', [
	'as'	=> 'peserta',
	'uses'	=> 'PesertaController@index'
]);

Route::post('/peserta', [
	'as'	=> 'peserta-post',
	'uses'	=> 'PesertaController@pesertaPost'
]);

Route::get('/peserta/{id}', [
	'as'	=> 'peserta-hapus',
	'uses'	=> 'PesertaController@hapus'
]);

Route::get('/peserta/kemaskini/{id}', [
	'as'	=> 'peserta-kemaskini',
	'uses'	=> 'PesertaController@kemaskini'
]);

//
// CARIAN
//
Route::get('/carian', [
	'as'	=> 'carian',
	'uses'	=> 'CarianController@index'
]);

Route::post('/carian', [
	'as'	=> 'carian-post',
	'uses'	=> 'CarianController@carian'
]);