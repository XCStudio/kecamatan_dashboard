<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Potensi extends Model
{
    //
    protected $table = 'das_potensi';

    protected $fillable = [
        'nama_potensi',
        'deskripsi',
        'lokasi',
        'long',
        'lat',
        'file_gambar',
    ];
}
