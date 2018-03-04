<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Penduduk;
use App\Http\Controllers\Controller;

class dashboardController extends Controller
{


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

    public function getDashboardKependudukan()
    {
        $data = [];

        if (!empty(request('kid'))) {
            $data['total_penduduk'] = request('kid');
            $data['total_lakilaki'] = request('did');
            $data['total_perempuan'] = request('did');
        } else {
            $total_penduduk = Penduduk::all()->count();

            $data['total_penduduk'] = number_format($total_penduduk);
            $data['total_lakilaki'] = number_format(Penduduk::all()->where('sex', '=', 1)->count());
            $data['total_perempuan'] = number_format(Penduduk::all()->where('sex', '=', 2)->count());
            $data['total_disabilitas'] = number_format(Penduduk::all()->where('cacat_id', '<>', 0)->where('cacat_id', '<>', null)->count());

            $ktp_terpenuhi = Penduduk::all()->count();
            $ktp_persen_terpenuhi = $ktp_terpenuhi / $total_penduduk * 100;
            $data['ktp_terpenuhi'] = number_format($ktp_terpenuhi);
            $data['ktp_persen_terpenuhi'] = number_format($ktp_persen_terpenuhi);
        }

        return $data;
    }
}
