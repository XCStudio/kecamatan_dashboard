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

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id', 'id');
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id', 'id');
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_id', 'id');
    }

    public static function getProfilTanpaDataUmum()
    {
        $data_umums = DataUmum::get();
        $ids = array();
        foreach ($data_umums as $val){
            $ids[] = $val->kecamatan_id;
        }

        return self::with('Kecamatan')->whereNotIn('kecamatan_id', $ids)->get();
    }
}