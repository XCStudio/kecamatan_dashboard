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
                'kecamatan_id' => '5203090',
                'tipologi' => 'Kecamatan maju namun terpencil.',
                'luas_wilayah' => 0.0,
                'jumlah_penduduk' => 0,
                'jml_laki_laki' => 0,
                'jml_perempuan' => 0,
                'bts_wil_utara' => 'Kecamatan A',
                'bts_wil_timur' => 'Kecamatan B',
                'bts_wil_selatan' => 'Kecamatan C',
                'bts_wil_barat' => 'Kecamatan D',
                'jml_puskesmas' => 0,
                'jml_puskesmas_pembantu' => 0,
                'jml_posyandu' => 0,
                'jml_pondok_bersalin' => 0,
                'jml_paud' => 0,
                'jml_sd' => 0,
                'jml_smp' => 0,
                'jml_sma' => 0,
                'jml_masjid_besar' => 0,
                'jml_gereja' => 0,
                'jml_pasar' => 0,
                'jml_balai_pertemuan' => 0,
                'kepadatan_penduduk' => 0,
                'created_at' => '2018-02-03 10:33:43',
                'updated_at' => '2018-02-03 12:23:31',
            ),
            1 => 
            array (
                'id' => 2,
                'kecamatan_id' => '3213150',
                'tipologi' => 'Masyarakat Madani',
                'luas_wilayah' => 2000.0,
                'jumlah_penduduk' => 20000,
                'jml_laki_laki' => 10000,
                'jml_perempuan' => 10000,
                'bts_wil_utara' => 'Kecamatan Binong',
                'bts_wil_timur' => 'Kecamatan Haurgeulis',
                'bts_wil_selatan' => 'Kecamatan Subang',
                'bts_wil_barat' => 'Kecamatan Pagaden',
                'jml_puskesmas' => 0,
                'jml_puskesmas_pembantu' => 0,
                'jml_posyandu' => 0,
                'jml_pondok_bersalin' => 0,
                'jml_paud' => 0,
                'jml_sd' => 0,
                'jml_smp' => 0,
                'jml_sma' => 0,
                'jml_masjid_besar' => 0,
                'jml_gereja' => 0,
                'jml_pasar' => 0,
                'jml_balai_pertemuan' => 0,
                'kepadatan_penduduk' => 200,
                'created_at' => '2018-02-03 13:21:21',
                'updated_at' => '2018-02-03 13:21:21',
            ),
        ));
        
        
    }
}