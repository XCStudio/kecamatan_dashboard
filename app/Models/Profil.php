<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Profil extends Model
{
    // ID Kecamatan untuk default profil
    public static $defaultProfil = '5203090';

    protected $table = 'das_profil';
    
    protected $fillable = [
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
        return $this->hasOne(Kecamatan::class, 'id', 'kecamatan_id');
    }

    public function kabupaten()
    {
        return $this->hasOne(Kabupaten::class, 'id', 'kabupaten_id');
    }

    public function provinsi()
    {
        return $this->hasOne(Provinsi::class, 'id', 'provinsi_id');
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

    public function dataUmum()
    {
        return $this->hasOne(DataUmum::class, 'kecamatan_id', 'kecamatan_id');
    }

    public function visiMisi()
    {
        return $this->hasOne(VisiMisi::class, 'kecamatan_id', 'kecamatan_id');
    }
}