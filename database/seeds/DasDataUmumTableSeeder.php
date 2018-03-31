<?php

use Illuminate\Database\Seeder;

class DasDataUmumTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('das_data_umum')->delete();
        
        \DB::table('das_data_umum')->insert(array (
            0 => 
            array (
                'id' => 1,
                'profil_id'=>  1,
                'kecamatan_id' => '1107062',
                'tipologi' => NULL,
                'luas_wilayah' => NULL,
                'jumlah_penduduk' => NULL,
                'jml_laki_laki' => NULL,
                'jml_perempuan' => NULL,
                'bts_wil_utara' => NULL,
                'bts_wil_timur' => NULL,
                'bts_wil_selatan' => NULL,
                'bts_wil_barat' => NULL,
                'jml_puskesmas' => NULL,
                'jml_puskesmas_pembantu' => NULL,
                'jml_posyandu' => NULL,
                'jml_pondok_bersalin' => NULL,
                'jml_paud' => NULL,
                'jml_sd' => NULL,
                'jml_smp' => NULL,
                'jml_sma' => NULL,
                'jml_masjid_besar' => NULL,
                'jml_gereja' => NULL,
                'jml_pasar' => NULL,
                'jml_balai_pertemuan' => NULL,
                'kepadatan_penduduk' => NULL,
                'embed_peta' => 'Edit Peta Pada Menu Data Umum.',
                'created_at' => '2018-03-30 06:39:09',
                'updated_at' => '2018-03-30 06:39:09',
            ),
        ));
        
        
    }
}