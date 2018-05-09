<?php

namespace App\Providers;

use App\Models\DataDesa;
use App\Models\DataUmum;
use App\Models\Penduduk;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // default lengt string
        Schema::defaultStringLength(191);

        Penduduk::saved(function($model){
            $dataUmum = DataUmum::where('kecamatan_id',$model->kecamatan_id)->first();


            $dataUmum->jumlah_penduduk = $model->where('kecamatan_id', $model->kecamatan_id)->count();
            $dataUmum->jml_laki_laki = $model->where('sex', 1)->count();
            $dataUmum->jml_perempuan = $model->where('sex', 2)->count();
            $dataUmum->luas_wilayah = DataDesa::where('kecamatan_id', $model->kecamatan_id)->sum('luas_wilayah');
            $dataUmum->kepadatan_penduduk = ($dataUmum->luas_wilayah == 0)? 0:$dataUmum->jumlah_penduduk /$dataUmum->luas_wilayah;

            $dataUmum->save();
        });

        Penduduk::deleted(function($model){

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
