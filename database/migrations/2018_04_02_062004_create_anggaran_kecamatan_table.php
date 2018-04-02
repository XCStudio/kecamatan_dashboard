<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnggaranKecamatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('das_anggaran_kecamatan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tahun');
            $table->char('kecamatan_id', 7);
            $table->double('total_anggaran',16,2);
            $table->double('total_belanja',16,2);
            $table->double('belanja_pegawai',16,2);
            $table->double('belanja_barang_jasa',16,2);
            $table->double('belanja_modal',16,2);
            $table->double('belanja_tidak_langsung',16,2);
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
        Schema::dropIfExists('das_anggaran_kecamatan');
    }
}
