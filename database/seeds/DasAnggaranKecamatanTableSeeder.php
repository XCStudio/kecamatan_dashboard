<?php

use Illuminate\Database\Seeder;

class DasAnggaranKecamatanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('das_anggaran_kecamatan')->delete();
        
        \DB::table('das_anggaran_kecamatan')->insert(array (
            0 => 
            array (
                'id' => 1,
                'tahun' => 2016,
                'kecamatan_id' => '1107062',
                'total_anggaran' => 2359257351.0,
                'total_belanja' => 2359257351.0,
                'belanja_pegawai' => 207625000.0,
                'belanja_barang_jasa' => 509258519.0,
                'belanja_modal' => 8982250.0,
                'belanja_tidak_langsung' => 1633391582.0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'tahun' => 2017,
                'kecamatan_id' => '1107062',
                'total_anggaran' => 2557755861.0,
                'total_belanja' => 2557755861.0,
                'belanja_pegawai' => 143025000.0,
                'belanja_barang_jasa' => 730261765.0,
                'belanja_modal' => 24263235.0,
                'belanja_tidak_langsung' => 1660205861.0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'tahun' => 2018,
                'kecamatan_id' => '1107062',
                'total_anggaran' => 2160740668.0,
                'total_belanja' => 2160740668.0,
                'belanja_pegawai' => 160625000.0,
                'belanja_barang_jasa' => 239100476.0,
                'belanja_modal' => 52087661.0,
                'belanja_tidak_langsung' => 1708927531.0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}