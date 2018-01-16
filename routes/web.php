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

Route::namespace('Auth')->group(function () {
    Route::get('login', [ 'as' => 'login', 'uses' => 'AuthController@index' ]);
    Route::post('login', [ 'as' => 'login', 'uses' => 'AuthController@loginProcess' ]);
    Route::get('register', [ 'as' => 'register', 'uses' => 'AuthController@register' ]);
    Route::post('register', [ 'as' => 'register', 'uses' => 'AuthController@registerProcess' ]);
});

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
Route::group(['middleware' => 'sentinel_access:admin'], function() {
    Route::get( 'logout', [ 'as' => 'logout', 'uses' => 'Auth\AuthController@logout'] );
    // User Management
    Route::group( ['prefix' => 'user'], function () {
        Route::get( 'getData', [ 'as' => 'user.getdata', 'uses' => 'User\UserController@getData' ] );
        Route::get( '/' , [ 'as' => 'user.index', 'uses' => 'User\UserController@index' ]);
        Route::get( 'create' , [ 'as' => 'user.create', 'uses' => 'User\UserController@create' ]);
        Route::post( 'store' , [ 'as' => 'user.store', 'uses' => 'User\UserController@store' ]);
        Route::get( 'edit/{id}' , [ 'as' => 'user.edit', 'uses' => 'User\UserController@edit' ]);
        Route::put( 'update/{id}' , [ 'as' => 'user.update', 'uses' => 'User\UserController@update' ]);
        Route::put( 'updatePassword/{id}' , [ 'as' => 'user.updatePassword', 'uses' => 'User\UserController@updatePassword' ]);
        Route::put( 'password/{id}' , [ 'as' => 'user.password', 'uses' => 'User\UserController@password' ]);
        Route::delete( 'destroy/{id}' , [ 'as' => 'user.destroy', 'uses' => 'User\UserController@destroy' ]);
        Route::post( 'active/{id}' , [ 'as' => 'user.active', 'uses' => 'User\UserController@active' ]);
        Route::get( 'photo-profil/{id}' , [ 'as' => 'user.photo', 'uses' => 'User\UserController@photo' ]);
        Route::put( 'update-photo/{id}' , [ 'as' => 'user.uphoto', 'uses' => 'User\UserController@updatePhoto' ]);
    });

    // Role Management
    Route::group( ['prefix' => 'role'], function()  {
        Route::get( 'getData', [ 'as' => 'role.getdata', 'uses' => 'Role\RoleController@getData' ] );
        Route::get( '/' , [ 'as' => 'role.index', 'uses' => 'Role\RoleController@index' ]);
        Route::get( 'create' , [ 'as' => 'role.create', 'uses' => 'Role\RoleController@create' ]);
        Route::post( 'store' , [ 'as' => 'role.store', 'uses' => 'Role\RoleController@store' ]);
        Route::get( 'edit/{id}' , [ 'as' => 'role.edit', 'uses' => 'Role\RoleController@edit' ]);
        Route::put( 'update/{id}' , [ 'as' => 'role.update', 'uses' => 'Role\RoleController@update' ]);
        Route::delete( 'destroy/{id}' , [ 'as' => 'role.destroy', 'uses' => 'Role\RoleController@destroy' ]);
    });
});

// Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
