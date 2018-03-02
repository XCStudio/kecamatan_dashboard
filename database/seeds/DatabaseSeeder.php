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
        $this->call(DasProfilTableSeeder::class);
		$this->call(DasDataUmumTableSeeder::class);
        $this->call(RefPekerjaanTableSeeder::class);
        $this->call(RefAgamaTableSeeder::class);
        $this->call(RefKawinTableSeeder::class);
        $this->call(RefHubunganKeluargaTableSeeder::class);
        $this->call(RefPendidikanTableSeeder::class);
        $this->call(RefPendidikanKkTableSeeder::class);
        $this->call(RefGolonganDarahTableSeeder::class);
        $this->call(RefCaraKbTableSeeder::class);
        $this->call(RefWarganegaraTableSeeder::class);
        $this->call(RefCacatTableSeeder::class);
        $this->call(RefSakitMenahunTableSeeder::class);
        $this->call(DasPendudukTableSeeder::class);
        $this->call(DasWilClusterdesaTableSeeder::class);
        $this->call(DasKeluargaTableSeeder::class);
        $this->call(RefUmurTableSeeder::class);
    }
}
