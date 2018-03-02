<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Penduduk;
use App\Http\Controllers\Controller;
use App\Models\Profil;
use App\Models\Umur;
use Illuminate\Support\Facades\DB;

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
        $defaultProfil = Profil::$defaultProfil;
        $data['defaultProfil'] = $defaultProfil;
        $data['year_list'] = years_list();


        $data = array_merge($data, $this->createDashboardKependudukan($defaultProfil, date('Y')));


        return view('dashboard.kependudukan.show_kependudukan')->with($data);
        //return json_encode();
    }

    public function showKependudukanPartial()
    {
        $data['page_title'] = 'Kependudukan';
        $data['page_description'] = 'Statistik Kependudukan';
        $defaultProfil = Profil::$defaultProfil;
        $data['defaultProfil'] = $defaultProfil;
        $data['year_list'] = years_list();

        if (!empty(request('kid')) && !empty(request('y')) && request('y')) {
            $data = array_merge($data, $this->createDashboardKependudukan(request('kid'), request('y')));
        }

        return $data;
    }


    protected function createDashboardKependudukan($kid, $year)
    {
        $data = array();
        $total_penduduk = DB::table('das_penduduk')
            ->join('das_keluarga', 'das_penduduk.id_kk', '=', 'das_keluarga.id')
            ->where('das_keluarga.kecamatan_id', '=', $kid)
            ->count();

        $data['total_penduduk'] = number_format($total_penduduk);

        $total_lakilaki = DB::table('das_penduduk')
            ->join('das_keluarga', 'das_penduduk.id_kk', '=', 'das_keluarga.id')
            ->where('das_keluarga.kecamatan_id', '=', $kid)
            ->where('sex', '=', 1)->count();
        $data['total_lakilaki'] = number_format($total_lakilaki);

        $total_perempuan = DB::table('das_penduduk')
            ->join('das_keluarga', 'das_penduduk.id_kk', '=', 'das_keluarga.id')
            ->where('das_keluarga.kecamatan_id', '=', $kid)
            ->where('sex', '=', 2)
            ->count();
        $data['total_perempuan'] = number_format($total_perempuan);

        $total_disabilitas = DB::table('das_penduduk')
            ->join('das_keluarga', 'das_penduduk.id_kk', '=', 'das_keluarga.id')
            ->where('das_keluarga.kecamatan_id', '=', $kid)
            ->where('cacat_id', '<>', null)
            ->count();
        $data['total_disabilitas'] = number_format($total_disabilitas);


        if ($total_penduduk == 0) {
            $data['ktp_terpenuhi'] = 0;
            $data['ktp_persen_terpenuhi'] = 0;

            $data['akta_terpenuhi'] = 0;
            $data['akta_persen_terpenuhi'] = 0;

            $data['aktanikah_terpenuhi'] = 0;
            $data['aktanikah_persen_terpenuhi'] = 0;

        } else {
            $ktp_terpenuhi = DB::table('das_penduduk')
                ->join('das_keluarga', 'das_penduduk.id_kk', '=', 'das_keluarga.id')
                ->where('das_keluarga.kecamatan_id', '=', $kid)
                ->count();
            $ktp_persen_terpenuhi = $ktp_terpenuhi / $total_penduduk * 100;
            $data['ktp_terpenuhi'] = number_format($ktp_terpenuhi);
            $data['ktp_persen_terpenuhi'] = number_format($ktp_persen_terpenuhi);

            $akta_terpenuhi = DB::table('das_penduduk')
                ->join('das_keluarga', 'das_penduduk.id_kk', '=', 'das_keluarga.id')
                ->where('das_penduduk.akta_lahir', '<>', null)
                ->where('das_penduduk.akta_lahir', '<>', ' ')
                ->count();
            $akta_persen_terpenuhi = $akta_terpenuhi / $total_penduduk * 100;
            $data['akta_terpenuhi'] = number_format($akta_terpenuhi);
            $data['akta_persen_terpenuhi'] = number_format($akta_persen_terpenuhi);

            $aktanikah_terpenuhi = DB::table('das_penduduk')
                ->join('das_keluarga', 'das_penduduk.id_kk', '=', 'das_keluarga.id')
                ->where('das_penduduk.akta_perkawinan', '<>', null)
                ->where('das_penduduk.akta_perkawinan', '<>', ' ')
                ->count();
            $aktanikah_persen_terpenuhi = $aktanikah_terpenuhi / $total_penduduk * 100;
            $data['aktanikah_terpenuhi'] = number_format($aktanikah_terpenuhi);
            $data['aktanikah_persen_terpenuhi'] = number_format($aktanikah_persen_terpenuhi);

        }
        // Data Grafik Pertumbuhan
        $data_pertumbuhan = array();
        foreach (array_sort(years_list()) as $year) {
            $result = DB::table('das_penduduk')
                ->join('das_keluarga', 'das_penduduk.id_kk', '=', 'das_keluarga.id')
                ->select('das_keluarga.id')
                ->where('das_keluarga.kecamatan_id', '=', $kid)
                ->whereRaw('year(das_keluarga.tgl_daftar) = ?', $year)
                ->count();
            $data_pertumbuhan[] = array('year' => $year, 'value' => $result);
        }
        $data['data_pertumbuhan'] = $data_pertumbuhan;


        // Data Grafik Kategori Usia
        $categories = DB::table('ref_umur')->orderBy('ref_umur.dari')->where('status', '=', 1)->get();
        $data_umur = array();
        foreach ($categories as $umur) {
            $total = DB::table('das_penduduk')
                ->join('das_keluarga', 'das_penduduk.id_kk', '=', 'das_keluarga.id')
                ->where('das_keluarga.kecamatan_id', '=', $kid)
                ->whereRaw('DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(das_penduduk.tanggal_lahir)), \'%Y\')+0 > ? ', $umur->dari)
                ->whereRaw('DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(tanggal_lahir)), \'%Y\')+0 <= ?', $umur->sampai)
                ->count();
            $data_umur[] = array('umur' => $umur->nama, 'value' => $total, 'color' => '#' . random_color());
        }

        $data['data_umur'] = $data_umur;
        return $data;
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
