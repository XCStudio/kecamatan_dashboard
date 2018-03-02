<?php

use Illuminate\Database\Seeder;

class RefUmurTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ref_umur')->delete();
        
        \DB::table('ref_umur')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'BALITA',
                'dari' => 0,
                'sampai' => 5,
                'status' => 2,
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'ANAK-ANAK',
                'dari' => 6,
                'sampai' => 17,
                'status' => 2,
            ),
            2 => 
            array (
                'id' => 3,
                'nama' => 'DEWASA',
                'dari' => 18,
                'sampai' => 30,
                'status' => 2,
            ),
            3 => 
            array (
                'id' => 4,
                'nama' => 'TUA',
                'dari' => 31,
                'sampai' => 120,
                'status' => 2,
            ),
            4 => 
            array (
                'id' => 6,
            'nama' => 'Bayi ( < 1 ) Tahun',
                'dari' => 0,
                'sampai' => 1,
                'status' => 1,
            ),
            5 => 
            array (
                'id' => 9,
            'nama' => 'Balita ( 2 > 4 ) Tahun',
                'dari' => 2,
                'sampai' => 4,
                'status' => 1,
            ),
            6 => 
            array (
                'id' => 12,
            'nama' => 'Anak-anak ( 5 > 9 ) Tahun',
                'dari' => 5,
                'sampai' => 9,
                'status' => 1,
            ),
            7 => 
            array (
                'id' => 13,
            'nama' => 'Anak-anak ( 10 > 14 ) Tah',
                'dari' => 10,
                'sampai' => 14,
                'status' => 1,
            ),
            8 => 
            array (
                'id' => 14,
            'nama' => 'Remaja ( 15 > 19 ) Tahun',
                'dari' => 15,
                'sampai' => 19,
                'status' => 1,
            ),
            9 => 
            array (
                'id' => 15,
            'nama' => 'Remaja ( 20 > 24 ) Tahun',
                'dari' => 20,
                'sampai' => 24,
                'status' => 1,
            ),
            10 => 
            array (
                'id' => 16,
            'nama' => 'Dewasa ( 25 > 29 ) Tahun',
                'dari' => 25,
                'sampai' => 29,
                'status' => 1,
            ),
            11 => 
            array (
                'id' => 17,
            'nama' => 'Dewasa ( 30 > 34 ) Tahun',
                'dari' => 30,
                'sampai' => 34,
                'status' => 1,
            ),
            12 => 
            array (
                'id' => 18,
            'nama' => 'Dewasa ( 35 > 39 ) Tahun ',
                'dari' => 35,
                'sampai' => 39,
                'status' => 1,
            ),
            13 => 
            array (
                'id' => 19,
            'nama' => 'Dewasa ( 40 > 44 ) Tahun',
                'dari' => 40,
                'sampai' => 44,
                'status' => 1,
            ),
            14 => 
            array (
                'id' => 20,
            'nama' => 'Tua ( 45 > 49 ) Tahun',
                'dari' => 45,
                'sampai' => 49,
                'status' => 1,
            ),
            15 => 
            array (
                'id' => 21,
            'nama' => 'Tua ( 50 > 54 ) Tahun',
                'dari' => 50,
                'sampai' => 54,
                'status' => 1,
            ),
            16 => 
            array (
                'id' => 22,
            'nama' => 'Tua ( 55 > 59 ) Tahun',
                'dari' => 55,
                'sampai' => 59,
                'status' => 1,
            ),
            17 => 
            array (
                'id' => 23,
            'nama' => 'Tua ( 60 > 64 ) Tahun',
                'dari' => 60,
                'sampai' => 64,
                'status' => 1,
            ),
            18 => 
            array (
                'id' => 24,
            'nama' => 'Tua ( 65 > 69 ) Tahun',
                'dari' => 65,
                'sampai' => 69,
                'status' => 1,
            ),
            19 => 
            array (
                'id' => 25,
            'nama' => 'Tua ( 70 > 74 ) Tahun',
                'dari' => 70,
                'sampai' => 74,
                'status' => 1,
            ),
            20 => 
            array (
                'id' => 26,
            'nama' => 'Lansia ( > 75 ) Tahun',
                'dari' => 75,
                'sampai' => 130,
                'status' => 1,
            ),
        ));
        
        
    }
}