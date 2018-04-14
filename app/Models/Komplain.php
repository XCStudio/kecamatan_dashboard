<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komplain extends Model
{
    //
  //
    protected $table = 'das_komplain';

    protected $fillable = [
        'kategori',
        'nik',
        'nama',
        'judul',
        'slug',
        'laporan',
        'anonim',
        'status',
        'lampiran1',
        'lampiran2',
        'lampiran3',
        'lampiran4',
    ];
}
