<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JawabKomplain extends Model
{
    //
    protected $table = 'das_jawab_komplain';

    protected $fillable = [
        'komplain_id',
        'penjawab',
        'jawaban'
    ];

    public function komplain()
    {
        return $this->belongsTo(Komplain::class,'komplain_id', 'komplian_id');
    }
}
