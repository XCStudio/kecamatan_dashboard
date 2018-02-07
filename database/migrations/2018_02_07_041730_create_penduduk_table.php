<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendudukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('das_penduduk', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 100);
            $table->decimal('nik', 16, 0);
            $table->integer('id_kk')->nullable(true);
            $table->tinyInteger('kk_level');
            $table->integer('id_rtm');
            $table->integer('rtm_level');
            $table->tinyInteger('sex')->nullable(true);
            $table->string('tempat_lahir', 100);
            $table->date('tanggal_lahir')->nullable(true);
            $table->integer('agama_id');
            $table->integer('pendidikan_kk_id');
            $table->integer('pendidikan_id');
            $table->integer('pendidikan_sedang_id');
            $table->integer('pekerjaan_id');
            $table->tinyInteger('status_kawin');
            $table->integer('warga_negara_id');
            $table->string('dokumen_pasport', 45)->nullable(true);
            $table->integer('dokumen_kitas')->nullable(true);
            $table->string('ayah_nik', 16);
            $table->string('ibu_nik', 16);
            $table->string('nama_ayah', 100);
            $table->string('nama_ibu', 100);
            $table->string('foto', 255)->nullable(true);
            $table->integer('golongan_darah_id');
            $table->integer('id_cluster');
            $table->integer('status')->nullable(true);
            $table->string('alamat_sebelumnya', 255)->nullable(true);
            $table->string('alamat_sekarang', 255)->nullable(true);
            $table->tinyInteger('status_dasar');
            $table->integer('hamil')->nullable(true);
            $table->integer('cacat_id')->nullable(true);
            $table->integer('sakit_menahun_id');
            $table->string('akta_lahir', 40);
            $table->string('akta_perkawinan', 40)->nullable(true);
            $table->date('tanggal_perkawinan');
            $table->string('akta_perceraian', 40)->nullable(true);
            $table->date('tanggal_perceraian')->nullable(true);
            $table->tinyInteger('cara_kb_id')->nullable(true);
            $table->string('telepon', 20)->nullable(true);
            $table->date('tanggal_akhir_pasport');
            $table->string('no_kk_sebelumnya', 30)->nullable(true);
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
        Schema::dropIfExists('das_penduduk');
    }
}
