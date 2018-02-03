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
    Route::get('login', ['as' => 'login', 'uses' => 'AuthController@index']);
    Route::post('login', ['as' => 'login', 'uses' => 'AuthController@loginProcess']);
    Route::get('register', ['as' => 'register', 'uses' => 'AuthController@register']);
    Route::post('register', ['as' => 'register', 'uses' => 'AuthController@registerProcess']);
});

Route::group(['middleware' => 'sentinel_access:admin'], function () {
    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);

    // Prefix URL for Setting
    Route::group(['prefix' => 'setting'], function () {
        // User Management
        Route::group(['prefix' => 'user'], function () {
            Route::get('getdata', ['as' => 'setting.user.getdata', 'uses' => 'User\UserController@getDataUser']);
            Route::get('/', ['as' => 'setting.user.index', 'uses' => 'User\UserController@index']);
            Route::get('create', ['as' => 'setting.user.create', 'uses' => 'User\UserController@create']);
            Route::post('store', ['as' => 'setting.user.store', 'uses' => 'User\UserController@store']);
            Route::get('edit/{id}', ['as' => 'setting.user.edit', 'uses' => 'User\UserController@edit']);
            Route::put('update/{id}', ['as' => 'setting.user.update', 'uses' => 'User\UserController@update']);
            Route::put('updatePassword/{id}', ['as' => 'setting.user.updatePassword', 'uses' => 'User\UserController@updatePassword']);
            Route::put('password/{id}', ['as' => 'setting.user.password', 'uses' => 'User\UserController@password']);
            Route::delete('destroy/{id}', ['as' => 'setting.user.destroy', 'uses' => 'User\UserController@destroy']);
            Route::post('active/{id}', ['as' => 'setting.user.active', 'uses' => 'User\UserController@active']);
            Route::get('photo-profil/{id}', ['as' => 'setting.user.photo', 'uses' => 'User\UserController@photo']);
            Route::put('update-photo/{id}', ['as' => 'setting.user.uphoto', 'uses' => 'User\UserController@updatePhoto']);
        });

        // Role Management
        Route::group(['prefix' => 'role'], function () {
            Route::get('getdata', ['as' => 'setting.role.getdata', 'uses' => 'Role\RoleController@getData']);
            Route::get('/', ['as' => 'setting.role.index', 'uses' => 'Role\RoleController@index']);
            Route::get('create', ['as' => 'setting.role.create', 'uses' => 'Role\RoleController@create']);
            Route::post('store', ['as' => 'setting.role.store', 'uses' => 'Role\RoleController@store']);
            Route::get('edit/{id}', ['as' => 'setting.role.edit', 'uses' => 'Role\RoleController@edit']);
            Route::put('update/{id}', ['as' => 'setting.role.update', 'uses' => 'Role\RoleController@update']);
            Route::delete('destroy/{id}', ['as' => 'setting.role.destroy', 'uses' => 'Role\RoleController@destroy']);
        });

    });
});

/**
 * Group Routing for Dashboard
 */
Route::namespace('Dashboard')->group(function () {
    Route::get('/', 'DashboardProfilController@showProfile')->name('dashboard.profil');

    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('index', 'DashboardProfilController@showProfile')->name('dashboard.profil');
        Route::get('profil', 'DashboardProfilController@showProfile')->name('dashboard.profil');
        Route::get('show-profil/{id}', 'DashboardProfilController@showProfilPartial')->name('dashboard.show-profil');


        Route::get('kependudukan', 'DashboardController@showKependudukan')->name('dashboard.kependudukan');
        Route::get('kesehatan', 'DashboardController@showKesehatan')->name('dashboard.kesehatan');
        Route::get('pendidikan', 'DashboardController@showPendidikan')->name('dashboard.pendidikan');
        Route::get('program-bantuan', 'DashboardController@showProgramBantuan')->name('dashboard.program-bantuan');
        Route::get('anggaran-dan-realisasi', 'DashboardController@showAnggaranDanRealisasi')->name('dashboard.anggaran-dan-realisasi');
        Route::get('anggaran-desa', 'DashboardController@showAnggaranDesa')->name('dashboard.anggaran-desa');
    });

});

/**
 * Group Routing for Informasi
 */
Route::namespace('Informasi')->group(function () {
    Route::group(['prefix' => 'informasi'], function () {

        //Routes for prosedur resource
        Route::group(['prefix' => 'prosedur'], function () {
            Route::get('/', ['as' => 'informasi.prosedur.index', 'uses' => 'ProsedurController@index']);
            Route::get('show/{id}', ['as' => 'informasi.prosedur.show', 'uses' => 'ProsedurController@show']);
            Route::get('create', ['as' => 'informasi.prosedur.create', 'uses' => 'ProsedurController@create']);
            Route::post('store', ['as' => 'informasi.prosedur.store', 'uses' => 'ProsedurController@store']);
            Route::get('edit/{id}', ['as' => 'informasi.prosedur.edit', 'uses' => 'ProsedurController@edit']);
            Route::put('update/{id}', ['as' => 'informasi.prosedur.update', 'uses' => 'ProsedurController@update']);
            Route::delete('destroy/{id}', ['as' => 'informasi.prosedur.destroy', 'uses' => 'ProsedurController@destroy']);
        });

        //Routes for FAQ resources
        Route::group(['prefix' => 'faq'], function () {
            Route::get('/', ['as' => 'informasi.faq.index', 'uses' => 'FaqController@index']);
            Route::get('show/{id}', ['as' => 'informasi.faq.show', 'uses' => 'FaqController@show']);
            Route::get('create', ['as' => 'informasi.faq.create', 'uses' => 'FaqController@create']);
            Route::post('store', ['as' => 'informasi.faq.store', 'uses' => 'FaqController@store']);
            Route::get('edit/{id}', ['as' => 'informasi.faq.edit', 'uses' => 'FaqController@edit']);
            Route::post('update/{id}', ['as' => 'informasi.faq.update', 'uses' => 'FaqController@update']);
            Route::delete('destroy/{id}', ['as' => 'informasi.faq.destroy', 'uses' => 'FaqController@destroy']);
        });

        //Routes for Events resources
        Route::group(['prefix' => 'event'], function () {
            Route::get('/', ['as' => 'informasi.event.index', 'uses' => 'EventController@index']);
            Route::get('show/{id}', ['as' => 'informasi.event.show', 'uses' => 'EventController@show']);
            Route::get('create', ['as' => 'informasi.event.create', 'uses' => 'EventController@create']);
            Route::post('store', ['as' => 'informasi.event.store', 'uses' => 'EventController@store']);
            Route::get('edit/{id}', ['as' => 'informasi.event.edit', 'uses' => 'EventController@edit']);
            Route::post('update/{id}', ['as' => 'informasi.event.update', 'uses' => 'EventController@update']);
            Route::delete('destroy/{id}', ['as' => 'informasi.event.destroy', 'uses' => 'EventController@destroy']);
        });

        Route::get('layanan', 'InformasiController@showLayanan')->name('informasi.layanan');
        Route::get('potensi', 'InformasiController@showPotensi')->name('informasi.potensi');

        Route::get('kontak', 'InformasiController@showKontak')->name('informasi.kontak');
        Route::get('kalender', 'InformasiController@showKalender')->name('informasi.kalender');
    });
});

/**
 * Group Routing for Profil
 */
Route::namespace('Profil')->group(function () {
    Route::group(['prefix' => 'profil'], function () {

        //Routes for Visi & Misi resources
        Route::group(['prefix' => 'visi-misi'], function () {
            Route::get('/', ['as' => 'profil.visi-misi.index', 'uses' => 'VisiMisiController@index']);
            Route::get('show/{id}', ['as' => 'profil.visi-misi.show', 'uses' => 'VisiMisiController@show']);
            Route::get('create', ['as' => 'profil.visi-misi.create', 'uses' => 'VisiMisiController@create']);
            Route::post('store', ['as' => 'profil.visi-misi.store', 'uses' => 'VisiMisiController@store']);
            Route::get('edit/{id}', ['as' => 'profil.visi-misi.edit', 'uses' => 'VisiMisiController@edit']);
            Route::post('update/{id}', ['as' => 'profil.visi-misi.update', 'uses' => 'VisiMisiController@update']);
            Route::delete('destroy/{id}', ['as' => 'profil.visi-misi.destroy', 'uses' => 'VisiMisiController@destroy']);
        });

        //Routes for Regulasi resources
        Route::group(['prefix' => 'regulasi'], function () {
            Route::get('/', ['as' => 'profil.regulasi.index', 'uses' => 'RegulasiController@index']);
            Route::get('show/{id}', ['as' => 'profil.regulasi.show', 'uses' => 'RegulasiController@show']);
            Route::get('create', ['as' => 'profil.regulasi.create', 'uses' => 'RegulasiController@create']);
            Route::post('store', ['as' => 'profil.regulasi.store', 'uses' => 'RegulasiController@store']);
            Route::get('edit/{id}', ['as' => 'profil.regulasi.edit', 'uses' => 'RegulasiController@edit']);
            Route::post('update/{id}', ['as' => 'profil.regulasi.update', 'uses' => 'RegulasiController@update']);
            Route::delete('destroy/{id}', ['as' => 'profil.regulasi.destroy', 'uses' => 'RegulasiController@destroy']);
        });
    });
});

/**
 * Group Routing for Data
 *
 */

Route::namespace('Data')->group(function () {
    Route::group(['prefix' => 'data'], function () {

        // Routes Resources Profil
        Route::group(['prefix' => 'profil'], function () {
            Route::get('getdata', ['as' => 'data.profil.getdata', 'uses' => 'ProfilController@getDataProfil']);
            Route::get('/', ['as' => 'data.profil.index', 'uses' => 'ProfilController@index']);
            Route::get('create', ['as' => 'data.profil.create', 'uses' => 'ProfilController@create']);
            Route::post('store', ['as' => 'data.profil.store', 'uses' => 'ProfilController@store']);
            Route::get('edit/{id}', ['as' => 'data.profil.edit', 'uses' => 'ProfilController@edit']);
            Route::put('update/{id}', ['as' => 'data.profil.update', 'uses' => 'ProfilController@update']);
            Route::delete('destroy/{id}', ['as' => 'data.profil.destroy', 'uses' => 'ProfilController@destroy']);
        });

        //Routes Resource Data Umum
        Route::group(['prefix' => 'data-umum'], function () {
            Route::get('getdata', ['as' => 'data.data-umum.getdata', 'uses' => 'DataUmumController@getDataUmum']);
            Route::get('/', ['as' => 'data.data-umum.index', 'uses' => 'DataUmumController@index']);
            Route::get('create', ['as' => 'data.data-umum.create', 'uses' => 'DataUmumController@create']);
            Route::post('store', ['as' => 'data.data-umum.store', 'uses' => 'DataUmumController@store']);
            Route::get('show/{id}', ['as' => 'data.data-umum.show', 'uses' => 'DataUmumController@show']);
            Route::get('edit/{id}', ['as' => 'data.data-umum.edit', 'uses' => 'DataUmumController@edit']);
            Route::put('update/{id}', ['as' => 'data.data-umum.update', 'uses' => 'DataUmumController@update']);
            Route::delete('destroy/{id}', ['as' => 'data.data-umum.destroy', 'uses' => 'DataUmumController@destroy']);
        });

    });
});

/**
 *
 * Grouep Routing API Internal for Select2
 */

//Users JSON
Route::get('/api/users', function () {
    return \App\Models\User::where('first_name', 'LIKE', '%' . request('q') . '%')->paginate(10);
});

// All Provinsi Select2
Route::get('/api/provinsi', function () {
    return \App\Models\Provinsi::where('nama', 'LIKE', '%' . strtoupper(request('q')) . '%')->paginate(10);
});

// All Kabupaten Select2
Route::get('/api/kabupaten', function () {
    return \App\Models\Kabupaten::where('nama', 'LIKE', '%' . strtoupper(request('q')) . '%')->paginate(10);
});

//  All Kecamatan Select2
Route::get('/api/kecamatan', function () {
    return \App\Models\Kecamatan::where('nama', 'LIKE', '%' . strtoupper(request('q')) . '%')->paginate(10);
});

// All Desa Select2
Route::get('/api/desa', function () {
    return \App\Models\Desa::where('nama', 'LIKE', '%' . strtoupper(request('q')) . '%')->paginate(10);
});

// All Profil Select2
Route::get('/api/profil', function () {
    return DB::table('das_profil')
        ->join('ref_kecamatan', 'das_profil.kecamatan_id', '=', 'ref_kecamatan.id')
        ->select('ref_kecamatan.id', 'ref_kecamatan.nama')
        ->where('ref_kecamatan.nama', 'LIKE', '%' . strtoupper(request('q')) . '%')
        ->paginate(10);
});