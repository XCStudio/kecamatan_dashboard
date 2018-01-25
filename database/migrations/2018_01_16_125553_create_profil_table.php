<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_kecamatan',10);
            $table->string('nama_kecamatan', 150);
            $table->integer('provinsi_id');
            $table->integer('kabupaten_id');
            $table->string('alamat', 255);
            $table->string('kodepos', 10);
            $table->string('telepon', 20);
            $table->string('email', 200);
            $table->string('nama_camat', 100);
            $table->string('sekretaris_camat', 100);
            $table->string('kepsek_pemerintahan_umum', 100);
            $table->string('kepsek_kesejahteraan_masyarakat', 100);
            $table->string('kepsek_pemberdayaan_masyarakat', 100);
            $table->string('kepsek_pelayanan_umum', 100);
            $table->string('kepsek_tantrib', 100);
            $table->string('struktur_organisasi_file', 255);
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
        Schema::dropIfExists('profil');
    }
}
