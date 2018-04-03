<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnggaranDesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('das_anggaran_desa', function (Blueprint $table) {
            $table->increments('id');
            $table->char('kecamatan_id', 7);
            $table->char('desa_id', 10);
            $table->integer('tahun');
            $table->double('in_dd', 16, 2)->nullable(true);
            $table->double('in_add', 16, 2)->nullable(true);
            $table->double('in_pad', 16, 2)->nullable(true);
            $table->double('in_bhpr', 16, 2)->nullable(true);
            $table->double('in_bantuan_kabupaten', 16, 2)->nullable(true);
            $table->double('in_bantuan_provinsi', 16, 2)->nullable(true);
            $table->double('out_penyelenggaraan_pemerintahan', 16, 2)->nullable(true);
            $table->double('out_pembangunan', 16, 2)->nullable(true);
            $table->double('out_pembinaan_masyarakat', 16, 2)->nullable(true);
            $table->double('out_pemberdayaan_masyarakat', 16, 2)->nullable(true);
            $table->double('out_tak_terduga', 16, 2)->nullable(true);
            $table->double('out_silpa', 16, 2)->nullable(true);
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
        Schema::dropIfExists('das_anggaran_desa');
    }
}
