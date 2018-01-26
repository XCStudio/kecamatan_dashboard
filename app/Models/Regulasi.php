<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regulasi extends Model
{
    //
    protected $fillable = [
            'kecamatan_id',
            'tipe_regulasi',
            'judul',
            'deskripsi',
            'file_regulasi'
        ];
}
