<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model
{
    // 
    protected $table = 'das_visimisi';
    
    protected $fillable = [
        'kecamatan_id',
        'visi',
        'misi'
    ];
}
