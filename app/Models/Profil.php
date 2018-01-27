<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    //
    protected $table = 'das_profil';
    
    protected $fillable = [
        'provinsi_id',
        'kabupaten_id',
        'kecamatan_id',
        'alamat',
        'kode_pos',
        'telepon',
        'email',
        'nama_camat',
        'sekretaris_camat',
        'kepsek_pemerintahan_umum',
        'kepsek_kesejahteraan_masyarakat',
        'kepsek_pemberdayaan_masyarakat',
        'kepsek_pelayanan_umum',
        'kepsek_trantib',
        'file_struktur_organisasi'
    ];
}