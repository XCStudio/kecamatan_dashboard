<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataUmumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('das_data_umum', function (Blueprint $table) {
            $table->increments('id');
            $table->char('kecamatan_id', 7);
            $table->string('tipologi', 255);
            $table->double('luas_wilayah');
            $table->integer('jumlah_penduduk');
            $table->integer('jml_laki_laki');
            $table->integer('jml_perempuan');
            $table->string('bts_wil_utara', 255);
            $table->string('bts_wil_timur', 255);
            $table->string('bts_wil_selatan', 255);
            $table->string('bts_wil_barat', 255);
            $table->integer('jml_puskesmas');
            $table->integer('jml_puskesmas_pembantu');
            $table->integer('jml_posyandu');
            $table->integer('jml_pondok_bersalin');
            $table->integer('jml_paud');
            $table->integer('jml_sd');
            $table->integer('jml_smp');
            $table->integer('jml_sma');
            $table->integer('jml_masjid_besar');
            $table->integer('jml_gereja');
            $table->integer('jml_pasar');
            $table->integer('jml_balai_pertemuan');
            $table->integer('kepadatan_penduduk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('das_data_umum');
    }
}
