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


// Tagging
Route::get('/tagging/kontinjen', [
	'as'	=> 'tagging-kontinjen',
	'uses'	=> 'TaggingController@kontinjen'
]);

Route::get('/tagging/atlet', [
	'as'	=> 'tagging-atlet',
	'uses'	=> 'TaggingController@atlet'
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

Route::get('/carian/rumusan', [
	'as'	=> 'carian-rumusan',
	'uses'	=> 'CarianController@rumusan'
]);

Route::post('/carian/rumusan', [
	'as'	=> 'carian-rumusan',
	'uses'	=> 'CarianController@rumusanPost'
]);

Route::get('carian/acara', [
	'as'	=> 'carian-acara',
	'uses'	=> 'CarianController@acara'
]);

Route::post('carian/acara', [
	'as'	=> 'carian-acara-post',
	'uses'	=> 'CarianController@acaraPost'
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

Route::post('/pdf/peserta/profil', [
	'as'	=> 'pdf-profil-post',
	'uses'	=> 'PdfController@profilPost'
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

Route::get('/pdf/laporan/rumusan/{id}', [
	'as'	=> 'pdf-rumusan',
	'uses'	=> 'PdfController@rumusan'
]);

Route::get('/pdf/laporan/kontinjen', [
	'as'	=> 'pdf-laporan-kontinjen',
	'uses'	=> 'PdfController@kontinjen'
]);

Route::get('/pdf/laporan/summary', [
	'as'	=> 'pdf-laporan-summary',
	'uses'	=> 'PdfController@summary'
]);

Route::get('/pdf/peserta/acara/{id}', [
    'as'    => 'pdf-peserta-acara',
    'uses'  => 'PdfController@pesertaAcara'
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

Route::get('/transaksi', [
	'as'	=> 'transaksi',
	'uses'	=> 'TransaksiController@index'
]);

Route::get('/laporan/kontinjen', [
	'as'	=> 'laporan-kontinjen',
	'uses'	=> 'LaporanController@kontinjen'
]);

Route::post('/laporan/kontinjen', [
	'as'	=> 'laporan-kontinjen-post',
	'uses'	=> 'LaporanController@kontinjenPost'
]);

Route::get('/laporan/agensi/acara', [
	'as'	=> 'laporan-agensi-acara',
	'uses'	=> 'LaporanController@agensiAcara'
]);

Route::post('/laporan/agensi/acara', [
	'as'	=> 'laporan-agensi-acara-post',
	'uses'	=> 'LaporanController@agensiAcaraPost'
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

// Display peserta with no acara
Route::get('/setting/8', [
	'as'	=> 'setting8',
	'uses'	=> 'SettingsController@setting8'
]);

// Find duplication of no Atlet
Route::get('setting/4', [
	'as'	=> 'setting4',
	'uses'	=> 'SettingsController@setting4'
]);

// Update users' status
Route::get('/setting/5', [
	'as'	=> 'setting5',
	'uses'	=> 'SettingsController@setting5'
]);

Route::get('/setting/5/{id}', [
	'as'	=> 'setting5s',
	'uses'	=> 'SettingsController@setting5s'
]);

// Carian No KP bermasalah
Route::get('/setting/nokp', [
	'as'	=> 'setting6',
	'uses'	=> 'SettingsController@setting6'
]);

// Carian Duplicate No KP
Route::get('/setting/7', [
	'as'	=> 'setting7',
	'uses'	=> 'SettingsController@setting7'
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