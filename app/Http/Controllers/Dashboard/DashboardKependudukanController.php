<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use Illuminate\Support\Facades\DB;

class DashboardKependudukanController extends Controller
{
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
        $data['list_kecamatan'] = Profil::with('kecamatan')->orderBy('kecamatan_id', 'desc')->get();
        $data['list_desa'] = DB::table('ref_desa')->select('*')->where('kecamatan_id', '=', $defaultProfil)->get();

        $data = array_merge($data, $this->createDashboardKependudukan($defaultProfil, 'ALL', date('Y')));

        return view('dashboard.kependudukan.show_kependudukan')->with($data);
    }

    public function showKependudukanPartial()
    {
        $data['page_title'] = 'Kependudukan';
        $data['page_description'] = 'Statistik Kependudukan';
        $defaultProfil = Profil::$defaultProfil;
        $data['defaultProfil'] = $defaultProfil;
        $data['year_list'] = years_list();

        if (!empty(request('kid')) && !empty(request('did')) && request('y')) {
            $data = array_merge($data, $this->createDashboardKependudukan(request('kid'), request('did'), request('y')));
        }

        return $data;
    }


    protected function createDashboardKependudukan($kid, $did, $year)
    {
        $data = array();

        // Get Total Penduduk
        $query_total_penduduk = DB::table('das_penduduk')
            ->join('das_keluarga', 'das_penduduk.id_kk', '=', 'das_keluarga.id')
            ->where('das_keluarga.kecamatan_id', '=', $kid)
            ->whereRaw('YEAR(das_keluarga.tgl_daftar) = ?', $year);
        if ($did != 'ALL') {
            $query_total_penduduk->where('das_keluarga.desa_id', '=', $did);
        }
        $total_penduduk = $query_total_penduduk->count();
        $data['total_penduduk'] = number_format($total_penduduk);

        // Get Total Lakilaki
        $query_total_lakilaki = DB::table('das_penduduk')
            ->join('das_keluarga', 'das_penduduk.id_kk', '=', 'das_keluarga.id')
            ->where('das_keluarga.kecamatan_id', '=', $kid)
            ->whereRaw('YEAR(das_keluarga.tgl_daftar) = ?', $year);
        if ($did != 'ALL') {
            $query_total_lakilaki->where('das_keluarga.desa_id', '=', $did);
        }
        $total_lakilaki = $query_total_lakilaki->where('sex', '=', 1)->count();
        $data['total_lakilaki'] = number_format($total_lakilaki);

        // Get Total Perempuan
        $query_total_perempuan = DB::table('das_penduduk')
            ->join('das_keluarga', 'das_penduduk.id_kk', '=', 'das_keluarga.id')
            ->where('das_keluarga.kecamatan_id', '=', $kid)
            ->where('sex', '=', 2)
            ->whereRaw('YEAR(das_keluarga.tgl_daftar) = ?', $year);
        if ($did != 'ALL') {
            $query_total_perempuan->where('das_keluarga.desa_id', '=', $did);
        }
        $total_perempuan = $query_total_perempuan->count();
        $data['total_perempuan'] = number_format($total_perempuan);

        // Get Total Disabilitas
        $query_total_disabilitas = DB::table('das_penduduk')
            ->join('das_keluarga', 'das_penduduk.id_kk', '=', 'das_keluarga.id')
            ->where('das_keluarga.kecamatan_id', '=', $kid)
            ->where('cacat_id', '<>', null)
            ->whereRaw('YEAR(das_keluarga.tgl_daftar) = ?', $year);
        if ($did != 'ALL') {
            $query_total_disabilitas->where('das_keluarga.desa_id', '=', $did);
        }
        $total_disabilitas = $query_total_disabilitas->count();
        $data['total_disabilitas'] = number_format($total_disabilitas);


        if ($total_penduduk == 0) {
            $data['ktp_terpenuhi'] = 0;
            $data['ktp_persen_terpenuhi'] = 0;

            $data['akta_terpenuhi'] = 0;
            $data['akta_persen_terpenuhi'] = 0;

            $data['aktanikah_terpenuhi'] = 0;
            $data['aktanikah_persen_terpenuhi'] = 0;

        } else {
            // Get Data KTP Penduduk Terpenuhi
            $query_ktp_terpenuhi = DB::table('das_penduduk')
                ->join('das_keluarga', 'das_penduduk.id_kk', '=', 'das_keluarga.id')
                ->whereRaw('DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(das_penduduk.tanggal_lahir)), \'%Y\')+0 > ? ', 17)
                ->where('das_keluarga.kecamatan_id', '=', $kid)
                ->whereRaw('YEAR(das_keluarga.tgl_daftar) = ?', $year);
            if ($did != 'ALL') {
                $query_ktp_terpenuhi->where('das_keluarga.desa_id', '=', $did);
            }
            $ktp_terpenuhi = $query_ktp_terpenuhi->count();
            $ktp_persen_terpenuhi = $ktp_terpenuhi / $total_penduduk * 100;
            $data['ktp_terpenuhi'] = number_format($ktp_terpenuhi);
            $data['ktp_persen_terpenuhi'] = number_format($ktp_persen_terpenuhi);

            // Get Data Akta Penduduk Terpenuhi
            $query_akta_terpenuhi = DB::table('das_penduduk')
                ->join('das_keluarga', 'das_penduduk.id_kk', '=', 'das_keluarga.id')
                ->where('das_penduduk.akta_lahir', '<>', null)
                ->where('das_penduduk.akta_lahir', '<>', ' ')
                ->where('das_keluarga.kecamatan_id', '=', $kid)
                ->whereRaw('YEAR(das_keluarga.tgl_daftar) = ?', $year);
            if ($did != 'ALL') {
                $query_akta_terpenuhi->where('das_keluarga.desa_id', '=', $did);
            }
            $akta_terpenuhi = $query_akta_terpenuhi->count();
            $akta_persen_terpenuhi = $akta_terpenuhi / $total_penduduk * 100;
            $data['akta_terpenuhi'] = number_format($akta_terpenuhi);
            $data['akta_persen_terpenuhi'] = number_format($akta_persen_terpenuhi);

            // Get Data Akta Nikah Penduduk Terpenuhi
            $query_aktanikah_terpenuhi = DB::table('das_penduduk')
                ->join('das_keluarga', 'das_penduduk.id_kk', '=', 'das_keluarga.id')
                ->where('das_penduduk.akta_perkawinan', '<>', null)
                ->where('das_penduduk.akta_perkawinan', '<>', ' ')
                ->where('das_keluarga.kecamatan_id', '=', $kid)
                ->whereRaw('YEAR(das_keluarga.tgl_daftar) = ?', $year);
            if ($did != 'ALL') {
                $query_aktanikah_terpenuhi->where('das_keluarga.desa_id', '=', $did);
            }
            $aktanikah_terpenuhi = $query_aktanikah_terpenuhi->count();
            $aktanikah_persen_terpenuhi = $aktanikah_terpenuhi / $total_penduduk * 100;
            $data['aktanikah_terpenuhi'] = number_format($aktanikah_terpenuhi);
            $data['aktanikah_persen_terpenuhi'] = number_format($aktanikah_persen_terpenuhi);

        }

        return $data;
    }

    public function getChartPenduduk()
    {
        $kid = request('kid');
        $did = request('did');
        $year = request('y');

        // Data Grafik Pertumbuhan
        $data = array();
        foreach (array_sort(years_list()) as $yearls) {
            $query_result = DB::table('das_penduduk')
                ->join('das_keluarga', 'das_penduduk.id_kk', '=', 'das_keluarga.id')
                ->select('das_keluarga.id')
                ->where('das_keluarga.kecamatan_id', '=', $kid)
                ->whereRaw('year(das_keluarga.tgl_daftar) = ?', $yearls);
            if ($did != 'ALL') {
                $query_result->where('das_keluarga.desa_id', '=', $did);
            }
            $result = $query_result->count();
            $data[] = array('year' => $yearls, 'value' => $result);
        }
        return $data;
    }

    public function getChartPendudukUsia()
    {
        $kid = request('kid');
        $did = request('did');
        $year = request('y');

        // Data Grafik Kategori Usia
        $categories = DB::table('ref_umur')->orderBy('ref_umur.dari')->where('status', '=', 1)->get();
        $data = array();
        foreach ($categories as $umur) {
            $query_total = DB::table('das_penduduk')
                ->join('das_keluarga', 'das_penduduk.id_kk', '=', 'das_keluarga.id')
                ->where('das_keluarga.kecamatan_id', '=', $kid)
                ->whereRaw('year(das_keluarga.tgl_daftar) = ?', $year)
                ->whereRaw('DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(das_penduduk.tanggal_lahir)), \'%Y\')+0 > ? ', $umur->dari)
                ->whereRaw('DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(tanggal_lahir)), \'%Y\')+0 <= ?', $umur->sampai);
            if ($did != 'ALL') {
                $query_total->where('das_keluarga.desa_id', '=', $did);
            }
            $total = $query_total->count();
            $data[] = array('umur' => $umur->nama, 'value' => $total, 'color' => '#' . random_color());
        }

        return $data;
    }

    public function getChartPendudukPendidikan()
    {
        $kid = request('kid');
        $did = request('did');
        $year = request('y');

        // Data Chart Penduduk By Pendidikan
        $data = array();
        $pendidikan = DB::table('ref_pendidikan_kk')->orderBy('id')->get();
        foreach ($pendidikan as $val) {
            $query_total = DB::table('das_penduduk')
                ->join('das_keluarga', 'das_penduduk.id_kk', '=', 'das_keluarga.id')
                ->leftJoin('ref_pendidikan_kk', 'das_penduduk.pendidikan_kk_id', '=', 'ref_pendidikan_kk.id')
                ->where('das_keluarga.kecamatan_id', '=', $kid)
                ->whereRaw('year(das_keluarga.tgl_daftar)= ?', $year)
                ->where('das_penduduk.pendidikan_kk_id', '=', $val->id);
            if ($did != 'ALL') {
                $query_total->where('das_keluarga.desa_id', '=', $did);
            }
            $total = $query_total->count();
            $data[] = array('level' => $val->nama, 'total' => $total, 'color' => '#'.random_color());

        }

        return $data;
    }

    public function getChartPendudukGolDarah()
    {
        $kid = request('kid');
        $did = request('did');
        $year = request('y');

        // Data Chart Penduduk By Golongan Darah
        $data = array();
        $golongan_darah = DB::table('ref_golongan_darah')->orderBy('id')->get();
        foreach ($golongan_darah as $val) {
            $query_total = DB::table('das_penduduk')
                ->join('das_keluarga', 'das_penduduk.id_kk', '=', 'das_keluarga.id')
                ->leftJoin('ref_pendidikan_kk', 'das_penduduk.pendidikan_kk_id', '=', 'ref_pendidikan_kk.id')
                ->where('das_keluarga.kecamatan_id', '=', $kid)
                ->whereRaw('year(das_keluarga.tgl_daftar)= ?', $year);
            if($val->id != 13){
                $query_total->where('das_penduduk.golongan_darah_id', '=', $val->id);
            }else{
                $query_total->whereRaw('das_penduduk.golongan_darah_id = 0 or das_penduduk.golongan_darah_id = 13');
            }

            if ($did != 'ALL') {
                $query_total->where('das_keluarga.desa_id', '=', $did);
            }
            $total = $query_total->count();
            $data[] = array('blod_type' => $val->nama, 'total' => $total, 'color' => '#'.random_color());

        }

        return $data;
    }

    public function getChartPendudukKawin()
    {
        $kid = request('kid');
        $did = request('did');
        $year = request('y');

        // Data Chart Penduduk By Status Perkawinan
        $data = array();
        $status_kawin = DB::table('ref_kawin')->orderBy('id')->get();
        foreach ($status_kawin as $val) {
            $query_total = DB::table('das_penduduk')
                ->join('das_keluarga', 'das_penduduk.id_kk', '=', 'das_keluarga.id')
                ->leftJoin('ref_pendidikan_kk', 'das_penduduk.pendidikan_kk_id', '=', 'ref_pendidikan_kk.id')
                ->where('das_keluarga.kecamatan_id', '=', $kid)
                ->whereRaw('year(das_keluarga.tgl_daftar)= ?', $year)
                ->where('das_penduduk.status_kawin', '=', $val->id);

            if ($did != 'ALL') {
                $query_total->where('das_keluarga.desa_id', '=', $did);
            }
            $total = $query_total->count();
            $data[] = array('status' => $val->nama, 'total' => $total, 'color' => '#'.random_color());
        }

        return $data;
    }

    public function getChartPendudukAgama()
    {
        $kid = request('kid');
        $did = request('did');
        $year = request('y');

        // Data Chart Penduduk By Aama
        $data = array();
        $agama = DB::table('ref_agama')->orderBy('id')->get();
        foreach ($agama as $val) {
            $query_total = DB::table('das_penduduk')
                ->join('das_keluarga', 'das_penduduk.id_kk', '=', 'das_keluarga.id')
                ->leftJoin('ref_pendidikan_kk', 'das_penduduk.pendidikan_kk_id', '=', 'ref_pendidikan_kk.id')
                ->where('das_keluarga.kecamatan_id', '=', $kid)
                ->whereRaw('year(das_keluarga.tgl_daftar)= ?', $year)
                ->where('das_penduduk.agama_id', '=', $val->id);

            if ($did != 'ALL') {
                $query_total->where('das_keluarga.desa_id', '=', $did);
            }
            $total = $query_total->count();
            $data[] = array('religion' => $val->nama, 'total' => $total, 'color' => '#'.random_color());
        }

        return $data;
    }

    public function getChartPendudukKelamin()
    {
        $kid = request('kid');
        $did = request('did');
        $year = request('y');

        // Data Chart Penduduk By Jenis Kelamin
        $data = array();
        $agama = [
            [
                'id' => 1,
                'nama' => 'LAKI-LAKI'
            ],
            [
                'id' => 2,
                'nama' => 'PEREMPUAN'
            ]
        ];
        foreach ($agama as $val) {
            $query_total = DB::table('das_penduduk')
                ->join('das_keluarga', 'das_penduduk.id_kk', '=', 'das_keluarga.id')
                ->where('das_keluarga.kecamatan_id', '=', $kid)
                ->whereRaw('year(das_keluarga.tgl_daftar)= ?', $year)
                ->where('das_penduduk.sex', '=', $val['id']);

            if ($did != 'ALL') {
                $query_total->where('das_keluarga.desa_id', '=', $did);
            }
            $total = $query_total->count();
            $data[] = array('sex' => $val['nama'], 'total' => $total, 'color' => '#'.random_color());
        }

        return $data;
    }
}
