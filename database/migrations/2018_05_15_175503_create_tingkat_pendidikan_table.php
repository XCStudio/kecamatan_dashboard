<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTingkatPendidikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('das_tingkat_pendidikan', function (Blueprint $table) {
            $table->increments('id');
            $table->char('kecamatan_id', 7);
            $table->char('desa_id', 10);
            $table->integer('bulan');
            $table->integer('tahun');
            $table->integer('tidak_tamat_sekolah');
            $table->integer('tamat_sd');
            $table->integer('tamat_smp');
            $table->integer('tamat_sma');
            $table->integer('tamat_diploma_sederajat');
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
        Schema::dropIfExists('das_tingkat_pendidikan');
    }
}
