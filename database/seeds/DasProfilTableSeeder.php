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
                'provinsi_id' => '52',
                'kabupaten_id' => '5271',
                'kecamatan_id' => '5203090',
                'alamat' => 'Jl. Koperasi No. 1, Kab Lombok Barat, Provinsi Nusa Tenggara Barat',
                'kode_pos' => '83653',
                'telepon' => '021-2345234',
                'email' => 'admin@mail.com',
                'nama_camat' => 'H. Hadi Fathurrahman, S.Sos, M.AP',
                'sekretaris_camat' => 'Drs. Zaenal Abidin',
                'kepsek_pemerintahan_umum' => 'Musyayad, S.Sos',
                'kepsek_kesejahteraan_masyarakat' => 'Suhartono, S.Sos',
                'kepsek_pemberdayaan_masyarakat' => 'Asrarudin, SE',
                'kepsek_pelayanan_umum' => 'Masturi, ST',
                'kepsek_trantib' => 'Mastur Idris, SH',
                'file_struktur_organisasi' => 'Lighthouse.jpg',
                'created_at' => '2018-02-03 06:57:26',
                'updated_at' => '2018-02-03 13:16:33',
            ),
            1 => 
            array (
                'id' => 2,
                'provinsi_id' => '32',
                'kabupaten_id' => '3213',
                'kecamatan_id' => '3213150',
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
                'created_at' => '2018-02-03 10:31:16',
                'updated_at' => '2018-02-03 10:31:16',
            ),
        ));
        
        
    }
}