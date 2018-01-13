<?php

namespace App\Http\Controllers\Profil;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfilController extends Controller
{
    /**
     * Menampilkan Visi & Misi Kecamatan
     **/

    public function showVisiMisi()
    {
        $data['page_title'] = 'Visi & Misi';
        //$data['page_description'] = 'Menampilkan Event Terdekat';

        return view('profil.visiMisi')->with($data);
    }

    /**
     * Menampilkan Regulasi Kecamatan
     **/

    public function showRegulasi()
    {
        $data['page_title'] = 'Regulasi';
        //$data['page_description'] = 'Menampilkan Event Terdekat';

        return view('profil.regulasi')->with($data);
    }
}
