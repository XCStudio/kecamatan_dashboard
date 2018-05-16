<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiswaPAUD extends Model
{
    //
    protected $table = 'das_siswa_paud';
    protected $fillable = [
        'kecamatan_id',
        'desa_id',
        'siswa_paud',
        'anak_usia_paud',
        'bulan',
        'tahun'
    ];

    public function desa()
    {
        return $this->hasOne(DataDesa::class, 'desa_id', 'desa_id');
    }
}
