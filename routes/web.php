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

// KONTINJEN

Route::get('/home', [
	'as'	=> 'home',
	'uses'	=> 'HomeController@index'
]);

Route::post('/home', [
	'as'	=> 'kontinjen-post',
	'uses'	=> 'HomeController@kontinjenPost'
]);

Route::get('/home/hapus/{id}', [
	'as'	=> 'kontinjen-hapus',
	'uses'	=> 'HomeController@hapus'
]);

Route::get('/home/kemaskini/{id}', [
	'as'	=> 'kontinjen-kemaskini',
	'uses'	=> 'HomeController@kemaskini'
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


// ACARA
Route::get('/acara/hapus/{peserta}/{acara}', [
	'as'	=> 'acara-hapus',
	'uses'	=> 'AcaraController@hapus'
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

Route::get('/carian-acara-agensi', [
	'as'	=> 'carian-acara-agensi',
	'uses'	=> 'CarianController@carianAcaraAgensi'
]);

Route::post('/carian-acara-agensi', [
	'as'	=> 'carian-acara-agensi',
	'uses'	=> 'CarianController@keputusanCarianAcaraAgensi'
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

Route::get('/pdf/laporan/profil', [
	'as'	=> 'pdf-profil',
	'uses'	=> 'PdfController@profil'
]);

Route::post('/pdf/tag', [
	'as'	=> 'pdf-tag',
	'uses'	=> 'PdfController@tag'
]);

Route::get('/pdf/laporan/keseluruhan/{id}', [
	'as'	=> 'pdf-laporan-keseluruhan',
	'uses'	=> 'PdfController@laporanKeseluruhan'
]);

Route::get('/pdf/laporan/penginapan', [
	'as'	=> 'pdf-penginapan',
	'uses'	=> 'PdfController@penginapan'
]);

Route::get('/pdf/laporan/acara-keseluruhan', [
	'as'	=> 'pdf-acara-keseluruhan',
	'uses'	=> 'PdfController@laporanAcaraKeseluruhan'
]);



//
// EXCEL
//
Route::get('/excel/keseluruhan', [
	'as'	=> 'excel-keseluruhan',
	'uses'	=> 'ExcelController@keseluruhan'
]);

Route::get('/excel/laporan/penginapan', [
	'as'	=> 'excel-penginapan',
	'uses'	=> 'ExcelController@penginapan'
]);


//
// Laporan
//
Route::get('/laporan/keseluruhan', [
	'as'	=> 'laporan-keseluruhan',
	'uses'	=> 'LaporanController@keseluruhan'
]);

Route::get('/laporan/acara/keseluruhan', [
	'as'	=> 'acara-keseluruhan',
	'uses'	=> 'LaporanController@acaraKeseluruhan'
]);

Route::get('/laporan/penginapan', [
	'as'	=> 'penginapan',
	'uses'	=> 'LaporanController@penginapan'
]);

Route::get('/senarai/semak', [
	'as'	=> 'senarai-semak',
	'uses'	=> 'LaporanController@senaraiSemak'
]);

Route::get('/summary', [
	'as'	=> 'summary',
	'uses'	=> 'SummaryController@index'
]);

//
// Settings
//

// remove penyertaan that is not in peserta
Route::get('/setting/1', [
	'as'	=> 'setting1',
	'uses'	=> 'SettingsController@setting1'
]);

// remove penyertaan that exceed the limit
Route::get('/setting/2', [
	'as'	=> 'setting2',
	'uses'	=> 'SettingsController@setting2'
]);

//Remove peserta with no acara
Route::get('/setting/3', [
	'as'	=> 'setting3',
	'uses'	=> 'SettingsController@setting3'
]);

//
// Nota
//
Route::get('/nota', [
	'as'	=> 'nota',
	'uses'	=> 'NotaController@index'
]);

//
// Peta
//
Route::get('/peta', [
	'as'	=> 'peta',
	'uses'	=> 'PetaController@index'
]);

//
// Pengesahan
//
Route::get('/pengesahan', [
	'as'	=> 'pengesahan',
	'uses'	=> 'PengesahanController@index'
]);

Route::post('/pengesahan', [
	'as'	=> 'pengesahan',
	'uses'	=> 'PengesahanController@indexPost'
]);