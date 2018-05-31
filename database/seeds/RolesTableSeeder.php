<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'slug' => 'super-admin',
                'name' => 'Super Administrator',
                'permissions' => '{"admin":true}',
                'created_at' => '2018-05-11 04:30:16',
                'updated_at' => '2018-05-11 04:30:16',
            ),
            1 => 
            array (
                'id' => 2,
                'slug' => 'admin-desa',
                'name' => 'Admin Desa',
                'permissions' => '',
                'created_at' => '2018-05-31 09:42:14',
                'updated_at' => '2018-05-31 09:42:14',
            ),
            2 => 
            array (
                'id' => 3,
                'slug' => 'admin-kecamatan',
                'name' => 'Admin Kecamatan',
                'permissions' => '',
                'created_at' => '2018-05-31 09:42:29',
                'updated_at' => '2018-05-31 09:42:29',
            ),
            3 => 
            array (
                'id' => 4,
                'slug' => 'camat',
                'name' => 'Camat',
                'permissions' => '',
                'created_at' => '2018-05-31 09:42:38',
                'updated_at' => '2018-05-31 09:42:38',
            ),
        ));
        
        
    }
}