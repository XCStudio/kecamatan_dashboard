<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiswaPaudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('das_siswa_paud', function (Blueprint $table) {
            $table->increments('id');
            $table->char('kecamatan_id', 7);
            $table->char('desa_id', 10);
            $table->integer('bulan');
            $table->integer('tahun');
            $table->integer('siswa_paud');
            $table->integer('anak_usia_paud');
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
        Schema::dropIfExists('das_siswa_paud');
    }
}
