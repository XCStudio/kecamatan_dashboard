<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegulasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regulasis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kecamatan_id');
            $table->string('tipe_regulasi', 30);
            $table->string('judul', 200);
            $table->text('deskripsi');
            $table->string('file_regulasi', 255);
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
        Schema::dropIfExists('regulasis');
    }
}
