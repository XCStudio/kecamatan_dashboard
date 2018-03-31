<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeluargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('das_keluarga', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_kk',16)->nullable();
            $table->string('nik_kepala',16)->nullable();
            $table->date('tgl_daftar')->nullable();
            $table->integer('kelas_sosial')->nullable();
            $table->dateTime('tgl_cetak_kk')->nullable();
            $table->string('alamat',200)->nullable();
            $table->string('dusun',50)->nullable();
            $table->string('rt',10)->nullable();
            $table->string('rw',10)->nullable();
            $table->integer('id_cluster')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('das_keluarga');
    }
}
