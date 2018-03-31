<?php

use Illuminate\Database\Seeder;

class DasProfilTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('das_profil')->delete();
        
        \DB::table('das_profil')->insert(array (
            0 => 
            array (
                'id' => 1,
                'provinsi_id' => '11',
                'kabupaten_id' => '1107',
                'kecamatan_id' => '1107062',
                'alamat' => '-',
                'kode_pos' => '-',
                'telepon' => '-',
                'email' => 'admin@mail.com',
                'nama_camat' => '-',
                'sekretaris_camat' => '-',
                'kepsek_pemerintahan_umum' => '-',
                'kepsek_kesejahteraan_masyarakat' => '-',
                'kepsek_pemberdayaan_masyarakat' => '-',
                'kepsek_pelayanan_umum' => '-',
                'kepsek_trantib' => '-',
                'file_struktur_organisasi' => NULL,
                'visi' => NULL,
                'misi' => NULL,
                'created_at' => '2018-03-30 06:39:09',
                'updated_at' => '2018-03-30 06:46:10',
            ),
        ));
        
        
    }
}