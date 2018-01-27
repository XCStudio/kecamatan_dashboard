<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('das_profil', function (Blueprint $table) {
            $table->increments('id');
            $table->char('provinsi_id', 2);
            $table->char('kabupaten_id', 4);
            $table->char('kecamatan_id', 7);
            $table->string('alamat', 200);
            $table->char('kode_pos', 12);
            $table->char('telepon', 15);
            $table->string('email', 255);
            $table->string('nama_camat', 150);
            $table->string('sekretaris_camat', 150);
            $table->string('kepsek_pemerintahan_umum', 150);
            $table->string('kepsek_kesejahteraan_masyarakat', 150);
            $table->string('kepsek_pemberdayaan_masyarakat', 150);
            $table->string('kepsek_pelayanan_umum', 150);
            $table->string('kepsek_trantib', 150);
            $table->string('file_struktur_organisasi', 255);
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
        Schema::dropIfExists('das_profil');
    }
}