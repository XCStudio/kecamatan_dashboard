<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Penduduk;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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
     * Menampilkan Data Pendidikan
     **/
    public function showPendidikan()
    {
        $data['page_title'] = 'Pendidikan';
        $data['page_description'] = 'Data Pendidikan';
        $data['years_list'] = years_list();

        // Grafik Data Pendidikan
        $data_pendidikan = array();
        $pendidikan = DB::table('ref_pendidikan_kk')->orderBy('id')->get();

        foreach (years_list() as $year) {
            $item = array();
            foreach ($pendidikan as $val) {
                $jumlah = DB::table('das_penduduk')
                    ->join('das_keluarga', 'das_penduduk.id_kk', '=', 'das_keluarga.id')
                    ->leftJoin('ref_pendidikan_kk', 'das_penduduk.pendidikan_kk_id', '=', 'ref_pendidikan_kk.id')
                    ->whereRaw('year(das_keluarga.tgl_daftar)= ?', $year)
                    ->where('das_penduduk.pendidikan_kk_id', '=', $val->id)
                    ->count();
                $item[] = array('jenjang' => $val->nama, 'jumlah' => $jumlah);

            }
            $data_pendidikan[$year] = $item;
        }
        $data['data_pendidikan'] = $data_pendidikan;

        return view('dashboard.pendidikan.pendidikan')->with($data);
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
