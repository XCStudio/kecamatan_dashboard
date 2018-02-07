<?php

use Illuminate\Database\Seeder;

class RefGolonganDarahTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ref_golongan_darah')->delete();
        
        \DB::table('ref_golongan_darah')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'A',
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'B',
            ),
            2 => 
            array (
                'id' => 3,
                'nama' => 'AB',
            ),
            3 => 
            array (
                'id' => 4,
                'nama' => 'O',
            ),
            4 => 
            array (
                'id' => 5,
                'nama' => 'A+',
            ),
            5 => 
            array (
                'id' => 6,
                'nama' => 'A-',
            ),
            6 => 
            array (
                'id' => 7,
                'nama' => 'B+',
            ),
            7 => 
            array (
                'id' => 8,
                'nama' => 'B-',
            ),
            8 => 
            array (
                'id' => 9,
                'nama' => 'AB+',
            ),
            9 => 
            array (
                'id' => 10,
                'nama' => 'AB-',
            ),
            10 => 
            array (
                'id' => 11,
                'nama' => 'O+',
            ),
            11 => 
            array (
                'id' => 12,
                'nama' => 'O-',
            ),
            12 => 
            array (
                'id' => 13,
                'nama' => 'TIDAK TAHU',
            ),
        ));
        
        
    }
}