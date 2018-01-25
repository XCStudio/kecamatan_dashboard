<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model
{
    protected $fillable = [
        'kecamatan_id',
        'visi',
        'misi'
    ];
}
