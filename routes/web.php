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

Route::post('/peserta/kemaskini', [
	'as'	=> 'peserta-kemaskini-post',
	'uses'	=> 'PesertaController@kemaskiniPost'
]);


// Info
Route::get('/peserta/info/{id}', [
	'as'	=> 'peserta-info',
	'uses'	=> 'PesertaController@info'
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

Route::get('/carian-nama', [
	'as'	=> 'carian-nama',
	'uses'	=> 'CarianController@carianNama'
]);

Route::post('/carian-nama', [
	'as'	=> 'carianNama-post',
	'uses'	=> 'CarianController@carianNamaResult'
]);

//
// Tagging
//
Route::get('/tagging', [
	'as'	=> 'tagging',
	'uses'	=> 'TaggingController@index'
]);

//
// PDF
//
Route::get('/pdf/{agensi_id}', [
	'as'	=> 'pdf-kontinjen',
	'uses'	=> 'PdfController@kontinjen'
]);

Route::get('/pdf/acara/{id}', [
	'as'	=> 'pdf-acara',
	'uses'	=> 'PdfController@acara'
]);

Route::get('/pdf/peserta/{id}', [
	'as'	=> 'pdf-peserta',
	'uses'	=> 'PdfController@peserta'
]);

Route::post('/pdf/tag', [
	'as'	=> 'pdf-tag',
	'uses'	=> 'PdfController@tag'
]);

Route::get('/pdf/laporan/keseluruhan/{id}', [
	'as'	=> 'pdf-laporan-keseluruhan',
	'uses'	=> 'PdfController@laporanKeseluruhan'
]);


//
// Laporan
//
Route::get('/laporan/keseluruhan', [
	'as'	=> 'laporan-keseluruhan',
	'uses'	=> 'LaporanController@keseluruhan'
]);



//
// Settings
//
Route::get('/setting/1', [
	'as'	=> 'setting1',
	'uses'	=> 'SettingsController@setting1'
]);

Route::get('/setting/2', [
	'as'	=> 'setting2',
	'uses'	=> 'SettingsController@setting2'
]);


//
// Nota
//
Route::get('/nota', [
	'as'	=> 'nota',
	'uses'	=> 'NotaController@index'
]);