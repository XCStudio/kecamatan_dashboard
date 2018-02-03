<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class dashboardController extends Controller
{
    /**
     * Menampilkan Data Profil Kecamatan
    **/

    public function showProfile()
    {
        $data['page_title'] = 'Profile Kecamatan';
        $data['page_description'] = 'Profil Kecamatan';

        return view('dashboard.profil')->with($data);
    }

    /**
     * Menampilkan Data Kependudukan
     **/
    public function showKependudukan()
    {
        $data['page_title'] = 'Kependudukan';
        $data['page_description'] = 'Statistik Kependudukan';

        return view('dashboard.kependudukan')->with($data);
    }


    /**
     * Menampilkan Data Kesehatan
     **/
    public function showKesehatan()
    {
        $data['page_title'] = 'Kesehatan';
        $data['page_description'] = 'Data Kesehatan';

        return view('dashboard.kesehatan')->with($data);
    }

    /**
     * Menampilkan Data Pendidikan
     **/
    public function showPendidikan()
    {
        $data['page_title'] = 'Pendidikan';
        $data['page_description'] = 'Data Pendidikan';

        return view('dashboard.pendidikan')->with($data);
    }

    /**
     * Menampilkan Data Program Bantuan
     **/
    public function showProgramBantuan()
    {
        $data['page_title'] = 'Program Bantuan';
        $data['page_description'] = 'Data Program Bantuan';

        return view('dashboard.programBantuan')->with($data);
    }

    /**
     * Menampilkan Data Anggaran Dan realisasi Kecamatan
     **/
    public function showAnggaranDanRealisasi()
    {
        $data['page_title'] = 'Anggaran Dan realisasi Kecamatan';
        $data['page_description'] = 'Data Anggaran Dan realisasi Kecamatan';

        return view('dashboard.anggaranDanRealisasi')->with($data);
    }

    /**
     * Menampilkan Data Anggaran Dan realisasi Kecamatan
     **/
    public function showAnggaranDesa()
    {
        $data['page_title'] = 'APBDes';
        $data['page_description'] = 'Kecamatan';

        return view('dashboard.anggaranDesa')->with($data);
    }
}
