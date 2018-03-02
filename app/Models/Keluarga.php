<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    //
    protected $table = 'das_keluarga';

    protected $fillable = [

    ];

    public function cluster()
    {
        return $this->hasOne(WilClusterDesa::class, 'id', 'id_cluster');
    }

    public function kepala_kk()
    {
        return $this->hasOne(Penduduk::class, 'id', 'nik_kepala');
    }
}
