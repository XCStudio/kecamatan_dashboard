<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regulasi extends Model
{
    //
    protected $table = 'das_regulasi';
    
    protected $fillable = [
            'kecamatan_id',
            'tipe_regulasi',
            'judul',
            'deskripsi',
            'file_regulasi'
        ];
}
