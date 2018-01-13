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
/**
 * Group Routing for Dashboard
 */
Route::namespace('Dashboard')->group(function () {
    Route::get('/', 'DashboardController@showProfile')->name('dashboard.profile');
    Route::get('/dashboard', 'DashboardController@showProfile')->name('dashboard.profile');
    Route::get('/dashboard/profile', 'DashboardController@showProfile')->name('dashboard.profile');
    Route::get('/dashboard/kependudukan', 'DashboardController@showKependudukan')->name('dashboard.kependudukan');
    Route::get('/dashboard/kesehatan', 'DashboardController@showKesehatan')->name('dashboard.kesehatan');
    Route::get('/dashboard/pendidikan', 'DashboardController@showPendidikan')->name('dashboard.pendidikan');
    Route::get('/dashboard/program-bantuan', 'DashboardController@showProgramBantuan')->name('dashboard.program-bantuan');
    Route::get('/dashboard/anggaran-dan-realisasi', 'DashboardController@showAnggaranDanRealisasi')->name('dashboard.anggaran-dan-realisasi');
    Route::get('/dashboard/anggaran-desa', 'DashboardController@showAnggaranDesa')->name('dashboard.anggaran-desa');
});

/**
 * Group Routing for Informasi
 */
Route::namespace('Informasi')->group(function () {
    Route::get('/informasi/prosedur', 'InformasiController@showProsedur')->name('informasi.prosedur');
    Route::get('/informasi/layanan', 'InformasiController@showLayanan')->name('informasi.layanan');
    Route::get('/informasi/potensi', 'InformasiController@showPotensi')->name('informasi.potensi');
    Route::get('/informasi/event', 'InformasiController@showEvent')->name('informasi.event');
    Route::get('/informasi/faq', 'InformasiController@showFAQ')->name('informasi.faq');
    Route::get('/informasi/kontak', 'InformasiController@showKontak')->name('informasi.kontak');
    Route::get('/informasi/kalender', 'InformasiController@showKalender')->name('informasi.kalender');
});

/**
 * Group Routing for Profil
 */
Route::namespace('Profil')->group(function () {
    Route::get('/profil/visi-misi', 'ProfilController@showVisiMisi')->name('profil.visi-misi');
    Route::get('/profil/regulasi', 'ProfilController@showRegulasi')->name('profil.regulasi');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
