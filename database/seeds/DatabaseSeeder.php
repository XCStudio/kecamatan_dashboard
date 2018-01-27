<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RefProvinsiTableSeeder::class);
        $this->call(RefKabupatenTableSeeder::class);
        $this->call(RefKecamatanTableSeeder::class);
        $this->call(RefDesaTableSeeder::class);
    }
}
