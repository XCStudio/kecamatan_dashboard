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
    //Route::get('register', ['as' => 'register', 'uses' => 'AuthController@register']);
    //Route::post('register', ['as' => 'register', 'uses' => 'AuthController@registerProcess']);
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
      
        // Komplain Kategori
        Route::group(['prefix' => 'komplain-kategori'], function(){
            Route::get('/', ['as' => 'setting.komplain-kategori.index', 'uses' => 'Setting\KategoriKomplainController@index']);
            Route::get('getdata', ['as' => 'setting.komplain-kategori.getdata', 'uses' => 'Setting\KategoriKomplainController@getData']);
            Route::get('create', ['as' => 'setting.komplain-kategori.create', 'uses' => 'Setting\KategoriKomplainController@create']);
            Route::post('store', ['as' => 'setting.komplain-kategori.store', 'uses' => 'Setting\KategoriKomplainController@store']);
            Route::get('edit/{id}', ['as' => 'setting.komplain-kategori.edit', 'uses' => 'Setting\KategoriKomplainController@edit']);
            Route::put('update/{id}', ['as' => 'setting.komplain-kategori.update', 'uses' => 'Setting\KategoriKomplainController@update']);
            Route::delete('destroy/{id}', ['as' => 'setting.komplain-kategori.destroy', 'uses' => 'Setting\KategoriKomplainController@destroy']);
        });

        // Tipe Regulasi
        Route::group(['prefix' => 'tipe-regulasi'], function(){
            Route::get('/', ['as' => 'setting.tipe-regulasi.index', 'uses' => 'Setting\TipeRegulasiController@index']);
            Route::get('getdata', ['as' => 'setting.tipe-regulasi.getdata', 'uses' => 'Setting\TipeRegulasiController@getData']);
            Route::get('create', ['as' => 'setting.tipe-regulasi.create', 'uses' => 'Setting\TipeRegulasiController@create']);
            Route::post('store', ['as' => 'setting.tipe-regulasi.store', 'uses' => 'Setting\TipeRegulasiController@store']);
            Route::get('edit/{id}', ['as' => 'setting.tipe-regulasi.edit', 'uses' => 'Setting\TipeRegulasiController@edit']);
            Route::put('update/{id}', ['as' => 'setting.tipe-regulasi.update', 'uses' => 'Setting\TipeRegulasiController@update']);
            Route::delete('destroy/{id}', ['as' => 'setting.tipe-regulasi.destroy', 'uses' => 'Setting\TipeRegulasiController@destroy']);
        });

        // Jenis Penyakit
            Route::group(['prefix' => 'jenis-penyakit'], function(){
            Route::get('/', ['as' => 'setting.jenis-penyakit.index', 'uses' => 'Setting\JenisPenyakitController@index']);
            Route::get('getdata', ['as' => 'setting.jenis-penyakit.getdata', 'uses' => 'Setting\JenisPenyakitController@getData']);
            Route::get('create', ['as' => 'setting.jenis-penyakit.create', 'uses' => 'Setting\JenisPenyakitController@create']);
            Route::post('store', ['as' => 'setting.jenis-penyakit.store', 'uses' => 'Setting\JenisPenyakitController@store']);
            Route::get('edit/{id}', ['as' => 'setting.jenis-penyakit.edit', 'uses' => 'Setting\JenisPenyakitController@edit']);
            Route::put('update/{id}', ['as' => 'setting.jenis-penyakit.update', 'uses' => 'Setting\JenisPenyakitController@update']);
            Route::delete('destroy/{id}', ['as' => 'setting.jenis-penyakit.destroy', 'uses' => 'Setting\JenisPenyakitController@destroy']);
        });
    });

    /**
    * Group Routing for COUNTER
    */
    Route::group(['prefix' => 'counter'], function () {
        Route::get('/', ['as'=>'counter.index', 'uses' => 'Counter\CounterController@index']);
    });
    
});

/**
 * Group Routing for Dashboard
 */
Route::namespace('Dashboard')->group(function () {
    Route::get('/', 'DashboardProfilController@showProfile')->name('dashboard.profil');

    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('index', 'DashboardProfilController@showProfile')->name('dashboard.profil.index');
        Route::get('profil', 'DashboardProfilController@showProfile')->name('dashboard.profil');

        Route::get('kependudukan', 'DashboardKependudukanController@showKependudukan')->name('dashboard.kependudukan');
        Route::get('show-kependudukan', 'DashboardKependudukanController@showKependudukanPartial')->name('dashboard.show-kependudukan');
        Route::get('chart-kependudukan', 'DashboardKependudukanController@getChartPenduduk')->name('dashboard.chart-kependudukan');
        Route::get('chart-kependudukan-usia', 'DashboardKependudukanController@getChartPendudukUsia')->name('dashboard.chart-kependudukan-usia');
        Route::get('chart-kependudukan-pendidikan', 'DashboardKependudukanController@getChartPendudukPendidikan')->name('dashboard.chart-kependudukan-pendidikan');
        Route::get('chart-kependudukan-goldarah', 'DashboardKependudukanController@getChartPendudukGolDarah')->name('dashboard.chart-kependudukan-goldarah');
        Route::get('chart-kependudukan-kawin', 'DashboardKependudukanController@getChartPendudukKawin')->name('dashboard.chart-kependudukan-kawin');
        Route::get('chart-kependudukan-agama', 'DashboardKependudukanController@getChartPendudukAgama')->name('dashboard.chart-kependudukan-agama');
        Route::get('chart-kependudukan-kelamin', 'DashboardKependudukanController@getChartPendudukKelamin')->name('dashboard.chart-kependudukan-kelamin');
        Route::get('data-penduduk', 'DashboardKependudukanController@getDataPenduduk')->name('dashboard.data-penduduk');

        Route::get('pendidikan', 'DashboardPendidikanController@showPendidikan')->name('dashboard.pendidikan');
        Route::get('chart-pendidikan-penduduk', 'DashboardPendidikanController@getChartPendidikanPenduduk')->name('dashboard.chart-pendidikan-penduduk');
        Route::get('chart-pendidikan-siswa', 'DashboardPendidikanController@getChartPendidikanSiswa')->name('dashboard.chart-pendidikan-siswa');
        Route::get('chart-tidak-sekolah', 'DashboardPendidikanController@getChartTidakSekolah')->name('dashboard.chart-tidak-sekolah');


        Route::group(['prefix' => 'kesehatan'], function () {
            Route::get('/', 'DashboardKesehatanController@showKesehatan')->name('dashboard.kesehatan');
            Route::get('chart-akiakb', 'DashboardKesehatanController@getChartAKIAKB')->name('dashboard.kesehatan.chart-akiakb');
        });


        Route::get('program-bantuan', 'DashboardController@showProgramBantuan')->name('dashboard.program-bantuan');

        Route::get('anggaran-dan-realisasi', 'DashboardAnggaranRealisasiController@showAnggaranDanRealisasi')->name('dashboard.anggaran-dan-realisasi');
        Route::get('chart-anggaran-realisasi', 'DashboardAnggaranRealisasiController@getChartAnggaranRealisasi')->name('dashboard.chart-anggaran-realisasi');

        Route::get('anggaran-desa', 'DashboardAnggaranDesaController@showAnggaranDesa')->name('dashboard.anggaran-desa');
        Route::get('chart-anggaran-desa', 'DashboardAnggaranDesaController@getChartAnggaranDesa')->name('dashboard.chart-anggaran-desa');
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
            Route::get('getdata', ['as' => 'informasi.prosedur.getdata', 'uses' => 'ProsedurController@getDataProsedur']);
            Route::get('create', ['as' => 'informasi.prosedur.create', 'uses' => 'ProsedurController@create']);
            Route::post('store', ['as' => 'informasi.prosedur.store', 'uses' => 'ProsedurController@store']);
            Route::get('edit/{id}', ['as' => 'informasi.prosedur.edit', 'uses' => 'ProsedurController@edit']);
            Route::put('update/{id}', ['as' => 'informasi.prosedur.update', 'uses' => 'ProsedurController@update']);
            Route::delete('destroy/{id}', ['as' => 'informasi.prosedur.destroy', 'uses' => 'ProsedurController@destroy']);
            Route::get('download/{id}', ['as' => 'informasi.prosedur.download', 'uses' => 'ProsedurController@download']);
        });

        //Routes for Regulasi resources
        Route::group(['prefix' => 'regulasi'], function () {
            Route::get('/', ['as' => 'informasi.regulasi.index', 'uses' => 'RegulasiController@index']);
            Route::get('show/{id}', ['as' => 'informasi.regulasi.show', 'uses' => 'RegulasiController@show']);
            Route::get('create', ['as' => 'informasi.regulasi.create', 'uses' => 'RegulasiController@create']);
            Route::post('store', ['as' => 'informasi.regulasi.store', 'uses' => 'RegulasiController@store']);
            Route::get('edit/{id}', ['as' => 'informasi.regulasi.edit', 'uses' => 'RegulasiController@edit']);
            Route::put('update/{id}', ['as' => 'informasi.regulasi.update', 'uses' => 'RegulasiController@update']);
            Route::delete('destroy/{id}', ['as' => 'informasi.regulasi.destroy', 'uses' => 'RegulasiController@destroy']);
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

        //Routes for Form Dokumen resources
        Route::group(['prefix' => 'form-dokumen'], function () {
            Route::get('/', ['as' => 'informasi.form-dokumen.index', 'uses' => 'FormDokumenController@index']);
            Route::get('show/{id}', ['as' => 'informasi.form-dokumen.show', 'uses' => 'FormDokumenController@show']);
            Route::get('create', ['as' => 'informasi.form-dokumen.create', 'uses' => 'FormDokumenController@create']);
            Route::get('getdata', ['as' => 'informasi.form-dokumen.getdata', 'uses' => 'FormDokumenController@getDataDokumen']);
            Route::post('store', ['as' => 'informasi.form-dokumen.store', 'uses' => 'FormDokumenController@store']);
            Route::get('edit/{id}', ['as' => 'informasi.form-dokumen.edit', 'uses' => 'FormDokumenController@edit']);
            Route::put('update/{id}', ['as' => 'informasi.form-dokumen.update', 'uses' => 'FormDokumenController@update']);
            Route::delete('destroy/{id}', ['as' => 'informasi.form-dokumen.destroy', 'uses' => 'FormDokumenController@destroy']);
        });

        Route::get('layanan', 'InformasiController@showLayanan')->name('informasi.layanan');
        Route::get('potensi', 'InformasiController@showPotensi')->name('informasi.potensi');

        Route::get('kontak', 'InformasiController@showKontak')->name('informasi.kontak');
        Route::get('kalender', 'InformasiController@showKalender')->name('informasi.kalender');
    });
});

/**
 * Group Routing for Sistem Komplain
 */
Route::namespace('SistemKomplain')->group(function () {
    Route::group(['prefix' => 'sistem-komplain'], function () {
        Route::get('/', ['as' => 'sistem-komplain.index', 'uses' => 'SistemKomplainController@index']);
        Route::get('kirim', ['as' => 'sistem-komplain.kirim', 'uses' => 'SistemKomplainController@kirim']);
        Route::post('store', ['as' => 'sistem-komplain.store', 'uses' => 'SistemKomplainController@store']);
        Route::get('edit/{id}', ['as' => 'sistem-komplain.edit', 'uses' => 'SistemKomplainController@edit']);
        Route::put('update/{id}', ['as' => 'sistem-komplain.update', 'uses' => 'SistemKomplainController@update']);
        Route::delete('destroy/{id}', ['as' => 'sistem-komplain.destroy', 'uses' => 'SistemKomplainController@destroy']);
        Route::get('komplain/{slug}', ['as' => 'sistem-komplain.komplain', 'uses' => 'SistemKomplainController@show']);
        Route::get('komplain/kategori/{slug}', ['as' => 'sistem-komplain.kategori', 'uses' => 'SistemKomplainController@indexKategori']);
        Route::get('komplain-sukses', ['as' => 'sistem-komplain.komplain-sukses', 'uses' => 'SistemKomplainController@indexSukses']);
        Route::post('tracking', ['as' => 'sistem-komplain.tracking', 'uses' => 'SistemKomplainController@tracking']);
    });
});

/**
 * Group Routing for Data
 *
 */

Route::group(['middleware' => 'sentinel_access:admin'], function () {
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
                Route::get('success/{id}', ['as' => 'data.profil.success', 'uses' => 'ProfilController@success']);
              Route::get('show', ['as' => 'data.profil.show', 'uses' => 'ProfilController@show']);
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
          
          //Routes Resource Data Desa
            Route::group(['prefix' => 'data-desa'], function () {
                Route::get('getdata', ['as' => 'data.data-desa.getdata', 'uses' => 'DataDesaController@getDataDesa']);
                Route::get('/', ['as' => 'data.data-desa.index', 'uses' => 'DataDesaController@index']);
                Route::get('create', ['as' => 'data.data-desa.create', 'uses' => 'DataDesaController@create']);
                Route::post('store', ['as' => 'data.data-desa.store', 'uses' => 'DataDesaController@store']);
                Route::get('show/{id}', ['as' => 'data.data-desa.show', 'uses' => 'DataDesaController@show']);
                Route::get('edit/{id}', ['as' => 'data.data-desa.edit', 'uses' => 'DataDesaController@edit']);
                Route::put('update/{id}', ['as' => 'data.data-desa.update', 'uses' => 'DataDesaController@update']);
                Route::delete('destroy/{id}', ['as' => 'data.data-desa.destroy', 'uses' => 'DataDesaController@destroy']);
            });

            //Routes Resource Penduduk
            Route::group(['prefix' => 'penduduk'], function () {
                Route::get('getdata', ['as' => 'data.penduduk.getdata', 'uses' => 'PendudukController@getPenduduk']);
                Route::get('/', ['as' => 'data.penduduk.index', 'uses' => 'PendudukController@index']);
                Route::get('create', ['as' => 'data.penduduk.create', 'uses' => 'PendudukController@create']);
                Route::post('store', ['as' => 'data.penduduk.store', 'uses' => 'PendudukController@store']);
                Route::get('show/{id}', ['as' => 'data.penduduk.show', 'uses' => 'PendudukController@show']);
                Route::get('edit/{id}', ['as' => 'data.penduduk.edit', 'uses' => 'PendudukController@edit']);
                Route::put('update/{id}', ['as' => 'data.penduduk.update', 'uses' => 'PendudukController@update']);
                Route::delete('destroy/{id}', ['as' => 'data.penduduk.destroy', 'uses' => 'PendudukController@destroy']);
                Route::get('import', ['as' => 'data.penduduk.import', 'uses' => 'PendudukController@import']);
                Route::post('import-excel', ['as' => 'data.penduduk.import-excel', 'uses' => 'PendudukController@importExcel']);
            });

            //Routes Resource Keluarga
            Route::group(['prefix' => 'keluarga'], function () {
                Route::get('getdata', ['as' => 'data.keluarga.getdata', 'uses' => 'KeluargaController@getKeluarga']);
                Route::get('/', ['as' => 'data.keluarga.index', 'uses' => 'KeluargaController@index']);
                Route::get('create', ['as' => 'data.keluarga.create', 'uses' => 'KeluargaController@create']);
                Route::post('store', ['as' => 'data.keluarga.store', 'uses' => 'KeluargaController@store']);
                Route::get('show/{id}', ['as' => 'data.keluarga.show', 'uses' => 'KeluargaController@show']);
                Route::get('edit/{id}', ['as' => 'data.keluarga.edit', 'uses' => 'KeluargaController@edit']);
                Route::put('update/{id}', ['as' => 'data.keluarga.update', 'uses' => 'KeluargaController@update']);
                Route::delete('destroy/{id}', ['as' => 'data.keluarga.destroy', 'uses' => 'KeluargaController@destroy']);
                Route::get('import', ['as' => 'data.keluarga.import', 'uses' => 'KeluargaController@import']);
                Route::post('import-excel', ['as' => 'data.keluarga.import-excel', 'uses' => 'KeluargaController@importExcel']);
            });



            //Routes Resource Layanan e-KTP
            Route::group(['prefix' => 'proses-ektp'], function () {
                Route::get('getdata', ['as' => 'data.proses-ektp.getdata', 'uses' => 'ProsesEKTPController@getDataProsesKTP']);
                Route::get('/', ['as' => 'data.proses-ektp.index', 'uses' => 'ProsesEKTPController@index']);
                Route::get('create', ['as' => 'data.proses-ektp.create', 'uses' => 'ProsesEKTPController@create']);
                Route::post('store', ['as' => 'data.proses-ektp.store', 'uses' => 'ProsesEKTPController@store']);
                Route::get('show/{id}', ['as' => 'data.proses-ektp.show', 'uses' => 'ProsesEKTPController@show']);
                Route::get('edit/{id}', ['as' => 'data.proses-ektp.edit', 'uses' => 'ProsesEKTPController@edit']);
                Route::put('update/{id}', ['as' => 'data.proses-ektp.update', 'uses' => 'ProsesEKTPController@update']);
                Route::delete('destroy/{id}', ['as' => 'data.proses-ektp.destroy', 'uses' => 'ProsesEKTPController@destroy']);
            });

            //Routes Resource Layanan Kartu Keluarga
            Route::group(['prefix' => 'proses-kk'], function () {
                Route::get('getdata', ['as' => 'data.proses-kk.getdata', 'uses' => 'ProsesKKController@getDataProsesKK']);
                Route::get('/', ['as' => 'data.proses-kk.index', 'uses' => 'ProsesKKController@index']);
                Route::get('create', ['as' => 'data.proses-kk.create', 'uses' => 'ProsesKKController@create']);
                Route::post('store', ['as' => 'data.proses-kk.store', 'uses' => 'ProsesKKController@store']);
                Route::get('show/{id}', ['as' => 'data.proses-kk.show', 'uses' => 'ProsesKKController@show']);
                Route::get('edit/{id}', ['as' => 'data.proses-kk.edit', 'uses' => 'ProsesKKController@edit']);
                Route::put('update/{id}', ['as' => 'data.proses-kk.update', 'uses' => 'ProsesKKController@update']);
                Route::delete('destroy/{id}', ['as' => 'data.proses-kk.destroy', 'uses' => 'ProsesKKController@destroy']);
            });

            //Routes Resource Layanan Akta Lahir
            Route::group(['prefix' => 'proses-aktalahir'], function () {
                Route::get('getdata', ['as' => 'data.proses-aktalahir.getdata', 'uses' => 'ProsesAktaLahirController@getDataProsesAktaLahir']);
                Route::get('/', ['as' => 'data.proses-aktalahir.index', 'uses' => 'ProsesAktaLahirController@index']);
                Route::get('create', ['as' => 'data.proses-aktalahir.create', 'uses' => 'ProsesAktaLahirController@create']);
                Route::post('store', ['as' => 'data.proses-aktalahir.store', 'uses' => 'ProsesAktaLahirController@store']);
                Route::get('show/{id}', ['as' => 'data.proses-aktalahir.show', 'uses' => 'ProsesAktaLahirController@show']);
                Route::get('edit/{id}', ['as' => 'data.proses-aktalahir.edit', 'uses' => 'ProsesAktaLahirController@edit']);
                Route::put('update/{id}', ['as' => 'data.proses-aktalahir.update', 'uses' => 'ProsesAktaLahirController@update']);
                Route::delete('destroy/{id}', ['as' => 'data.proses-aktalahir.destroy', 'uses' => 'ProsesAktaLahirController@destroy']);
            });

            //Routes Resource Surat Domisili
            Route::group(['prefix' => 'proses-domisili'], function () {
                Route::get('getdata', ['as' => 'data.proses-domisili.getdata', 'uses' => 'ProsesDomisiliController@getDataProsesDomisili']);
                Route::get('/', ['as' => 'data.proses-domisili.index', 'uses' => 'ProsesDomisiliController@index']);
                Route::get('create', ['as' => 'data.proses-domisili.create', 'uses' => 'ProsesDomisiliController@create']);
                Route::post('store', ['as' => 'data.proses-domisili.store', 'uses' => 'ProsesDomisiliController@store']);
                Route::get('show/{id}', ['as' => 'data.proses-domisili.show', 'uses' => 'ProsesDomisiliController@show']);
                Route::get('edit/{id}', ['as' => 'data.proses-domisili.edit', 'uses' => 'ProsesDomisiliController@edit']);
                Route::put('update/{id}', ['as' => 'data.proses-domisili.update', 'uses' => 'ProsesDomisiliController@update']);
                Route::delete('destroy/{id}', ['as' => 'data.proses-domisili.destroy', 'uses' => 'ProsesDomisiliController@destroy']);
            });

            //Routes Resource AKI & AKB
            Route::group(['prefix' => 'aki-akb'], function () {
                Route::get('getdata', ['as' => 'data.aki-akb.getdata', 'uses' => 'AKIAKBController@getDataAKIAKB']);
                Route::get('/', ['as' => 'data.aki-akb.index', 'uses' => 'AKIAKBController@index']);
                Route::get('edit/{id}', ['as' => 'data.aki-akb.edit', 'uses' => 'AKIAKBController@edit']);
                Route::put('update/{id}', ['as' => 'data.aki-akb.update', 'uses' => 'AKIAKBController@update']);
                Route::delete('destroy/{id}', ['as' => 'data.aki-akb.destroy', 'uses' => 'AKIAKBController@destroy']);
                Route::get('import', ['as' => 'data.aki-akb.import', 'uses' => 'AKIAKBController@import']);
                Route::post('do_import', ['as' => 'data.aki-akb.do_import', 'uses' => 'AKIAKBController@do_import']);
            });

            //Routes Resource AKI & AKB
            Route::group(['prefix' => 'imunisasi'], function () {
                Route::get('getdata', ['as' => 'data.imunisasi.getdata', 'uses' => 'ImunisasiController@getDataAKIAKB']);
                Route::get('/', ['as' => 'data.imunisasi.index', 'uses' => 'ImunisasiController@index']);
                Route::get('edit/{id}', ['as' => 'data.imunisasi.edit', 'uses' => 'ImunisasiController@edit']);
                Route::put('update/{id}', ['as' => 'data.imunisasi.update', 'uses' => 'ImunisasiController@update']);
                Route::delete('destroy/{id}', ['as' => 'data.imunisasi.destroy', 'uses' => 'ImunisasiController@destroy']);
                Route::get('import', ['as' => 'data.imunisasi.import', 'uses' => 'ImunisasiController@import']);
                Route::post('do_import', ['as' => 'data.imunisasi.do_import', 'uses' => 'ImunisasiController@do_import']);
            });

            //Routes Resource Epidemi Penyakit
            Route::group(['prefix' => 'epidemi-penyakit'], function () {
                Route::get('getdata', ['as' => 'data.epidemi-penyakit.getdata', 'uses' => 'EpidemiPenyakitController@getDataAKIAKB']);
                Route::get('/', ['as' => 'data.epidemi-penyakit.index', 'uses' => 'EpidemiPenyakitController@index']);
                Route::get('edit/{id}', ['as' => 'data.epidemi-penyakit.edit', 'uses' => 'EpidemiPenyakitController@edit']);
                Route::put('update/{id}', ['as' => 'data.epidemi-penyakit.update', 'uses' => 'EpidemiPenyakitController@update']);
                Route::delete('destroy/{id}', ['as' => 'data.epidemi-penyakit.destroy', 'uses' => 'EpidemiPenyakitController@destroy']);
                Route::get('import', ['as' => 'data.epidemi-penyakit.import', 'uses' => 'EpidemiPenyakitController@import']);
                Route::post('do_import', ['as' => 'data.epidemi-penyakit.do_import', 'uses' => 'EpidemiPenyakitController@do_import']);
            });

            //Routes Resource Toilet Sanitasi
            Route::group(['prefix' => 'toilet-sanitasi'], function () {
                Route::get('getdata', ['as' => 'data.toilet-sanitasi.getdata', 'uses' => 'ToiletSanitasiController@getDataAKIAKB']);
                Route::get('/', ['as' => 'data.toilet-sanitasi.index', 'uses' => 'ToiletSanitasiController@index']);
                Route::get('edit/{id}', ['as' => 'data.toilet-sanitasi.edit', 'uses' => 'ToiletSanitasiController@edit']);
                Route::put('update/{id}', ['as' => 'data.toilet-sanitasi.update', 'uses' => 'ToiletSanitasiController@update']);
                Route::delete('destroy/{id}', ['as' => 'data.toilet-sanitasi.destroy', 'uses' => 'ToiletSanitasiController@destroy']);
                Route::get('import', ['as' => 'data.toilet-sanitasi.import', 'uses' => 'ToiletSanitasiController@import']);
                Route::post('do_import', ['as' => 'data.toilet-sanitasi.do_import', 'uses' => 'ToiletSanitasiController@do_import']);
            });

        });
    });
});

/**
 * Utilities
 */
Route::any('refresh-captcha', 'HomeController@refresh_captcha')->name('refresh-captcha');

Route::group(['middleware' => ['web']], function () {
    if (Cookie::get(env('COUNTER_COOKIE', 'kd-counter')) == false) {
        Cookie::queue(env('COUNTER_COOKIE', 'kd-counter'), str_random(80), 2628000); // Forever aka 5 years
    }
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

// Desa Select2 By Kecamatan ID
Route::get('/api/desa-by-kid', function () {
    return DB::table('ref_desa')->select('id', 'nama')->where('kecamatan_id', '=', strtoupper(request('kid')))->get();
})->name('api.desa-by-kid');

// All Profil Select2
Route::get('/api/profil', function () {
    return DB::table('das_profil')
        ->join('ref_kecamatan', 'das_profil.kecamatan_id', '=', 'ref_kecamatan.id')
        ->select('ref_kecamatan.id', 'ref_kecamatan.nama')
        ->where('ref_kecamatan.nama', 'LIKE', '%' . strtoupper(request('q')) . '%')
        ->paginate(10);
})->name('api.profil');

// Profil By id
Route::get('/api/profil-byid', function () {
    return DB::table('das_profil')
        ->join('ref_kecamatan', 'das_profil.kecamatan_id', '=', 'ref_kecamatan.id')
        ->select('ref_kecamatan.id', 'ref_kecamatan.nama')
        ->where('ref_kecamatan.id', '=',  request('id'))->get();
})->name('api.profil-byid');

// All Penduduk Select2
Route::get('/api/penduduk', function () {
    return \App\Models\Penduduk::where('nama', 'LIKE', '%' . strtoupper(request('q')) . '%')->paginate(10);
})->name('api.penduduk');

// Penduduk By id
Route::get('/api/penduduk-byid', function () {
    return DB::table('das_penduduk')
        ->where('id', '=', request('id'))->get();
})->name('api.penduduk-byid');

Route::get('/api/test', function () {
    $data = array();
    foreach(kuartal_bulan() as $key=>$val)
    {
        $data[]=$key;
    }

    //return $data;

    $con = new \App\Http\Controllers\Dashboard\DashboardKesehatanController();

    return $con->getIdsQuartal('q4');
})->name('api.test');

// Dashboard Kependudukan
Route::namespace('Dashboard')->group(function () {

    Route::get('/api/dashboard/kependudukan', ['as' => 'dashboard.kekendudukan.getdata', 'uses' => 'DashboardController@getDashboardKependudukan']);
});
