<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\DataDesa;
use App\Models\Profil;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Counter;

class DashboardPendidikanController extends Controller
{
    public $nama_kuartal = array('q1'=>'Kuartal 1', 'q2' => 'Kuartal 2', 'q3' => 'Kuartal 3', 'q4' => 'Kuartal 4');
    //
    /**
     * Menampilkan Data Pendidikan
     **/
    public function showPendidikan()
    {
        Counter::count('dashboard.pendidikan');

        $data['page_title'] = 'Pendidikan';
        $data['page_description'] = 'Data Pendidikan Kecamatan';
        $defaultProfil = env('KD_DEFAULT_PROFIL', '1');
        $data['defaultProfil'] = $defaultProfil;
        $data['year_list'] = years_list();
        $data['list_kecamatan'] = Profil::with('kecamatan')->orderBy('kecamatan_id', 'desc')->get();
        $data['list_desa'] = DB::table('das_data_desa')->select('*')->where('kecamatan_id', '=', $defaultProfil)->get();

        return view('dashboard.pendidikan.show_pendidikan')->with($data);
    }

    public function getChartPendidikanPenduduk()
    {
        $kid = request('kid');
        $did = request('did');
        $year = request('y');

        // Grafik Data Pendidikan
        $data_pendidikan = array();
        if($year == 'ALL'){
            foreach (years_list() as $yearl) {
                // SD
                $query_total_sd = DB::table('das_penduduk')
                    ->join('das_keluarga', 'das_penduduk.no_kk', '=', 'das_keluarga.no_kk')
                    ->leftJoin('ref_pendidikan_kk', 'das_penduduk.pendidikan_kk_id', '=', 'ref_pendidikan_kk.id')
                    ->where('das_penduduk.kecamatan_id', '=', $kid)
                    ->whereRaw('year(das_keluarga.tgl_daftar)= ?', $yearl)
                    ->where('das_penduduk.pendidikan_kk_id', '=', 3);
                if ($did != 'ALL') {
                    $query_total_sd->where('das_penduduk.desa_id', '=', $did);
                }
                $total_sd = $query_total_sd->count();

                // SMP
                $query_total_sltp = DB::table('das_penduduk')
                    ->join('das_keluarga', 'das_penduduk.no_kk', '=', 'das_keluarga.no_kk')
                    ->leftJoin('ref_pendidikan_kk', 'das_penduduk.pendidikan_kk_id', '=', 'ref_pendidikan_kk.id')
                    ->where('das_penduduk.kecamatan_id', '=', $kid)
                    ->whereRaw('year(das_keluarga.tgl_daftar)= ?', $yearl)
                    ->where('das_penduduk.pendidikan_kk_id', '=', 4);
                if ($did != 'ALL') {
                    $query_total_sltp->where('das_penduduk.desa_id', '=', $did);
                }
                $total_sltp = $query_total_sltp->count();

                //SMA
                $query_total_slta = DB::table('das_penduduk')
                    ->join('das_keluarga', 'das_penduduk.no_kk', '=', 'das_keluarga.no_kk')
                    ->leftJoin('ref_pendidikan_kk', 'das_penduduk.pendidikan_kk_id', '=', 'ref_pendidikan_kk.id')
                    ->where('das_penduduk.kecamatan_id', '=', $kid)
                    ->whereRaw('year(das_keluarga.tgl_daftar)= ?', $yearl)
                    ->where('das_penduduk.pendidikan_kk_id', '=', 5);
                if ($did != 'ALL') {
                    $query_total_slta->where('das_penduduk.desa_id', '=', $did);
                }
                $total_slta = $query_total_slta->count();

                // DIPLOMA
                $query_total_diploma = DB::table('das_penduduk')
                    ->join('das_keluarga', 'das_penduduk.no_kk', '=', 'das_keluarga.no_kk')
                    ->leftJoin('ref_pendidikan_kk', 'das_penduduk.pendidikan_kk_id', '=', 'ref_pendidikan_kk.id')
                    ->where('das_penduduk.kecamatan_id', '=', $kid)
                    ->whereRaw('year(das_keluarga.tgl_daftar)= ?', $yearl)
                    ->whereRaw('(das_penduduk.pendidikan_kk_id = 6 or das_penduduk.pendidikan_kk_id = 7)');
                if ($did != 'ALL') {
                    $query_total_diploma->where('das_penduduk.desa_id', '=', $did);
                }
                $total_diploma = $query_total_diploma->count();

                // SARJANA
                $query_total_sarjana = DB::table('das_penduduk')
                    ->join('das_keluarga', 'das_penduduk.no_kk', '=', 'das_keluarga.no_kk')
                    ->leftJoin('ref_pendidikan_kk', 'das_penduduk.pendidikan_kk_id', '=', 'ref_pendidikan_kk.id')
                    ->where('das_penduduk.kecamatan_id', '=', $kid)
                    ->whereRaw('year(das_keluarga.tgl_daftar)= ?', $yearl)
                    ->whereRaw('(das_penduduk.pendidikan_kk_id = 8 or das_penduduk.pendidikan_kk_id = 9 or das_penduduk.pendidikan_kk_id = 10)');
                if ($did != 'ALL') {
                    $query_total_sarjana->where('das_penduduk.desa_id', '=', $did);
                }
                $total_sarjana = $query_total_sarjana->count();

                $data_pendidikan[] = [
                    'year' => $yearl,
                    'SD' => $total_sd,
                    'SLTP' => $total_sltp,
                    'SLTA' => $total_slta,
                    'DIPLOMA' => $total_diploma,
                    'SARJANA' => $total_sarjana,
                ];
            }
        }else{
            // SD
            $query_total_sd = DB::table('das_penduduk')
                ->join('das_keluarga', 'das_penduduk.no_kk', '=', 'das_keluarga.no_kk')
                ->leftJoin('ref_pendidikan_kk', 'das_penduduk.pendidikan_kk_id', '=', 'ref_pendidikan_kk.id')
                ->where('das_penduduk.kecamatan_id', '=', $kid)
                ->whereRaw('year(das_keluarga.tgl_daftar)= ?', $year)
                ->where('das_penduduk.pendidikan_kk_id', '=', 3);
            if ($did != 'ALL') {
                $query_total_sd->where('das_penduduk.desa_id', '=', $did);
            }
            $total_sd = $query_total_sd->count();

            // SMP
            $query_total_sltp = DB::table('das_penduduk')
                ->join('das_keluarga', 'das_penduduk.no_kk', '=', 'das_keluarga.no_kk')
                ->leftJoin('ref_pendidikan_kk', 'das_penduduk.pendidikan_kk_id', '=', 'ref_pendidikan_kk.id')
                ->where('das_penduduk.kecamatan_id', '=', $kid)
                ->whereRaw('year(das_keluarga.tgl_daftar)= ?', $year)
                ->where('das_penduduk.pendidikan_kk_id', '=', 4);
            if ($did != 'ALL') {
                $query_total_sltp->where('das_penduduk.desa_id', '=', $did);
            }
            $total_sltp = $query_total_sltp->count();

            //SMA
            $query_total_slta = DB::table('das_penduduk')
                ->join('das_keluarga', 'das_penduduk.no_kk', '=', 'das_keluarga.no_kk')
                ->leftJoin('ref_pendidikan_kk', 'das_penduduk.pendidikan_kk_id', '=', 'ref_pendidikan_kk.id')
                ->where('das_penduduk.kecamatan_id', '=', $kid)
                ->whereRaw('year(das_keluarga.tgl_daftar)= ?', $year)
                ->where('das_penduduk.pendidikan_kk_id', '=', 5);
            if ($did != 'ALL') {
                $query_total_slta->where('das_penduduk.desa_id', '=', $did);
            }
            $total_slta = $query_total_slta->count();

            // DIPLOMA
            $query_total_diploma = DB::table('das_penduduk')
                ->join('das_keluarga', 'das_penduduk.no_kk', '=', 'das_keluarga.no_kk')
                ->leftJoin('ref_pendidikan_kk', 'das_penduduk.pendidikan_kk_id', '=', 'ref_pendidikan_kk.id')
                ->where('das_penduduk.kecamatan_id', '=', $kid)
                ->whereRaw('year(das_keluarga.tgl_daftar)= ?', $year)
                ->whereRaw('(das_penduduk.pendidikan_kk_id = 6 or das_penduduk.pendidikan_kk_id = 7)');
            if ($did != 'ALL') {
                $query_total_diploma->where('das_penduduk.desa_id', '=', $did);
            }
            $total_diploma = $query_total_diploma->count();

            // SARJANA
            $query_total_sarjana = DB::table('das_penduduk')
                ->join('das_keluarga', 'das_penduduk.no_kk', '=', 'das_keluarga.no_kk')
                ->leftJoin('ref_pendidikan_kk', 'das_penduduk.pendidikan_kk_id', '=', 'ref_pendidikan_kk.id')
                ->where('das_penduduk.kecamatan_id', '=', $kid)
                ->whereRaw('year(das_keluarga.tgl_daftar)= ?', $year)
                ->whereRaw('(das_penduduk.pendidikan_kk_id = 8 or das_penduduk.pendidikan_kk_id = 9 or das_penduduk.pendidikan_kk_id = 10)');
            if ($did != 'ALL') {
                $query_total_sarjana->where('das_penduduk.desa_id', '=', $did);
            }
            $total_sarjana = $query_total_sarjana->count();

            $data_pendidikan[] = [
                'year' => $year,
                'SD' => $total_sd,
                'SLTP' => $total_sltp,
                'SLTA' => $total_slta,
                'DIPLOMA' => $total_diploma,
                'SARJANA' => $total_sarjana,
            ];
        }

        return $data_pendidikan;
    }

    public function getChartPendidikanSiswa()
    {
        $kid = request('kid');
        $did = request('did');
        $year = request('y');

        // Grafik Data Pendidikan
        $data_pendidikan = array();

        if($year == 'ALL'){
            foreach (years_list() as $yearl) {
                // SD
                $query_total_sd = DB::table('das_penduduk')
                    ->join('das_keluarga', 'das_penduduk.no_kk', '=', 'das_keluarga.no_kk')
                    ->leftJoin('ref_pendidikan_kk', 'das_penduduk.pendidikan_sedang_id', '=', 'ref_pendidikan_kk.id')
                    ->where('das_penduduk.kecamatan_id', '=', $kid)
                    ->whereRaw('year(das_keluarga.tgl_daftar)= ?', $yearl)
                    ->where('das_penduduk.pendidikan_sedang_id', '=', 3);
                if ($did != 'ALL') {
                    $query_total_sd->where('das_penduduk.desa_id', '=', $did);
                }
                $total_sd = $query_total_sd->count();

                // SMP
                $query_total_sltp = DB::table('das_penduduk')
                    ->join('das_keluarga', 'das_penduduk.no_kk', '=', 'das_keluarga.no_kk')
                    ->leftJoin('ref_pendidikan_kk', 'das_penduduk.pendidikan_sedang_id', '=', 'ref_pendidikan_kk.id')
                    ->where('das_penduduk.kecamatan_id', '=', $kid)
                    ->whereRaw('year(das_keluarga.tgl_daftar)= ?', $yearl)
                    ->where('das_penduduk.pendidikan_sedang_id', '=', 4);
                if ($did != 'ALL') {
                    $query_total_sltp->where('das_penduduk.desa_id', '=', $did);
                }
                $total_sltp = $query_total_sltp->count();

                //SMA
                $query_total_slta = DB::table('das_penduduk')
                    ->join('das_keluarga', 'das_penduduk.no_kk', '=', 'das_keluarga.no_kk')
                    ->leftJoin('ref_pendidikan_kk', 'das_penduduk.pendidikan_sedang_id', '=', 'ref_pendidikan_kk.id')
                    ->where('das_penduduk.kecamatan_id', '=', $kid)
                    ->whereRaw('year(das_keluarga.tgl_daftar)= ?', $yearl)
                    ->where('das_penduduk.pendidikan_sedang_id', '=', 5);
                if ($did != 'ALL') {
                    $query_total_slta->where('das_penduduk.desa_id', '=', $did);
                }
                $total_slta = $query_total_slta->count();

                // DIPLOMA
                $query_total_diploma = DB::table('das_penduduk')
                    ->join('das_keluarga', 'das_penduduk.no_kk', '=', 'das_keluarga.no_kk')
                    ->leftJoin('ref_pendidikan_kk', 'das_penduduk.pendidikan_sedang_id', '=', 'ref_pendidikan_kk.id')
                    ->where('das_penduduk.kecamatan_id', '=', $kid)
                    ->whereRaw('year(das_keluarga.tgl_daftar)= ?', $yearl)
                    ->whereRaw('(das_penduduk.pendidikan_sedang_id = 6 or das_penduduk.pendidikan_sedang_id = 7)');
                if ($did != 'ALL') {
                    $query_total_diploma->where('das_penduduk.desa_id', '=', $did);
                }
                $total_diploma = $query_total_diploma->count();

                // SARJANA
                $query_total_sarjana = DB::table('das_penduduk')
                    ->join('das_keluarga', 'das_penduduk.no_kk', '=', 'das_keluarga.no_kk')
                    ->leftJoin('ref_pendidikan_kk', 'das_penduduk.pendidikan_sedang_id', '=', 'ref_pendidikan_kk.id')
                    ->where('das_penduduk.kecamatan_id', '=', $kid)
                    ->whereRaw('year(das_keluarga.tgl_daftar)= ?', $yearl)
                    ->whereRaw('(das_penduduk.pendidikan_sedang_id = 8 or das_penduduk.pendidikan_sedang_id = 9 or das_penduduk.pendidikan_sedang_id = 10)');
                if ($did != 'ALL') {
                    $query_total_sarjana->where('das_penduduk.desa_id', '=', $did);
                }
                $total_sarjana = $query_total_sarjana->count();

                $data_pendidikan[] = [
                    'year' => $yearl,
                    'SD' => $total_sd,
                    'SLTP' => $total_sltp,
                    'SLTA' => $total_slta,
                    'DIPLOMA' => $total_diploma,
                    'SARJANA' => $total_sarjana,
                ];
            }
        }else{
            // SD
            $query_total_sd = DB::table('das_penduduk')
                ->join('das_keluarga', 'das_penduduk.no_kk', '=', 'das_keluarga.no_kk')
                ->leftJoin('ref_pendidikan_kk', 'das_penduduk.pendidikan_sedang_id', '=', 'ref_pendidikan_kk.id')
                ->where('das_penduduk.kecamatan_id', '=', $kid)
                ->whereRaw('year(das_keluarga.tgl_daftar)= ?', $year)
                ->where('das_penduduk.pendidikan_sedang_id', '=', 3);
            if ($did != 'ALL') {
                $query_total_sd->where('das_penduduk.desa_id', '=', $did);
            }
            $total_sd = $query_total_sd->count();

            // SMP
            $query_total_sltp = DB::table('das_penduduk')
                ->join('das_keluarga', 'das_penduduk.no_kk', '=', 'das_keluarga.no_kk')
                ->leftJoin('ref_pendidikan_kk', 'das_penduduk.pendidikan_sedang_id', '=', 'ref_pendidikan_kk.id')
                ->where('das_penduduk.kecamatan_id', '=', $kid)
                ->whereRaw('year(das_keluarga.tgl_daftar)= ?', $year)
                ->where('das_penduduk.pendidikan_sedang_id', '=', 4);
            if ($did != 'ALL') {
                $query_total_sltp->where('das_penduduk.desa_id', '=', $did);
            }
            $total_sltp = $query_total_sltp->count();

            //SMA
            $query_total_slta = DB::table('das_penduduk')
                ->join('das_keluarga', 'das_penduduk.no_kk', '=', 'das_keluarga.no_kk')
                ->leftJoin('ref_pendidikan_kk', 'das_penduduk.pendidikan_sedang_id', '=', 'ref_pendidikan_kk.id')
                ->where('das_penduduk.kecamatan_id', '=', $kid)
                ->whereRaw('year(das_keluarga.tgl_daftar)= ?', $year)
                ->where('das_penduduk.pendidikan_sedang_id', '=', 5);
            if ($did != 'ALL') {
                $query_total_slta->where('das_penduduk.desa_id', '=', $did);
            }
            $total_slta = $query_total_slta->count();

            // DIPLOMA
            $query_total_diploma = DB::table('das_penduduk')
                ->join('das_keluarga', 'das_penduduk.no_kk', '=', 'das_keluarga.no_kk')
                ->leftJoin('ref_pendidikan_kk', 'das_penduduk.pendidikan_sedang_id', '=', 'ref_pendidikan_kk.id')
                ->where('das_penduduk.kecamatan_id', '=', $kid)
                ->whereRaw('year(das_keluarga.tgl_daftar)= ?', $year)
                ->whereRaw('(das_penduduk.pendidikan_sedang_id = 6 or das_penduduk.pendidikan_sedang_id = 7)');
            if ($did != 'ALL') {
                $query_total_diploma->where('das_penduduk.desa_id', '=', $did);
            }
            $total_diploma = $query_total_diploma->count();

            // SARJANA
            $query_total_sarjana = DB::table('das_penduduk')
                ->join('das_keluarga', 'das_penduduk.no_kk', '=', 'das_keluarga.no_kk')
                ->leftJoin('ref_pendidikan_kk', 'das_penduduk.pendidikan_sedang_id', '=', 'ref_pendidikan_kk.id')
                ->where('das_penduduk.kecamatan_id', '=', $kid)
                ->whereRaw('year(das_keluarga.tgl_daftar)= ?', $year)
                ->whereRaw('(das_penduduk.pendidikan_sedang_id = 8 or das_penduduk.pendidikan_sedang_id = 9 or das_penduduk.pendidikan_sedang_id = 10)');
            if ($did != 'ALL') {
                $query_total_sarjana->where('das_penduduk.desa_id', '=', $did);
            }
            $total_sarjana = $query_total_sarjana->count();

            $data_pendidikan[] = [
                'year' => $year,
                'SD' => $total_sd,
                'SLTP' => $total_sltp,
                'SLTA' => $total_slta,
                'DIPLOMA' => $total_diploma,
                'SARJANA' => $total_sarjana,
            ];
        }

        return $data_pendidikan;
    }

    public function getChartTidakSekolah()
    {
        $kid = request('kid');
        $did = request('did');
        $year = request('y');

        // Grafik Data Tidak Sekolah
        $data_pendidikan = array();

        if($year == 'ALL') {
            foreach (years_list() as $yearl) {
                // SD
                $query_total_sd = DB::table('das_penduduk')
                    ->join('das_keluarga', 'das_penduduk.no_kk', '=', 'das_keluarga.no_kk')
                    ->leftJoin('ref_pendidikan_kk', 'das_penduduk.pendidikan_kk_id', '=', 'ref_pendidikan_kk.id')
                    ->where('das_penduduk.kecamatan_id', '=', $kid)
                    ->whereRaw('DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(das_penduduk.tanggal_lahir)), \'%Y\')+0 > ? ', 6)
                    ->whereRaw('DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(tanggal_lahir)), \'%Y\')+0 <= ?', 12)
                    ->whereRaw('year(das_keluarga.tgl_daftar)= ?', $yearl)
                    ->where('das_penduduk.pendidikan_kk_id', '=', 1);
                if ($did != 'ALL') {
                    $query_total_sd->where('das_penduduk.desa_id', '=', $did);
                }
                $total_sd = $query_total_sd->count();

                // SMP
                $query_total_sltp = DB::table('das_penduduk')
                    ->join('das_keluarga', 'das_penduduk.no_kk', '=', 'das_keluarga.no_kk')
                    ->leftJoin('ref_pendidikan_kk', 'das_penduduk.pendidikan_kk_id', '=', 'ref_pendidikan_kk.id')
                    ->where('das_penduduk.kecamatan_id', '=', $kid)
                    ->whereRaw('DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(das_penduduk.tanggal_lahir)), \'%Y\')+0 > ? ', 13)
                    ->whereRaw('DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(tanggal_lahir)), \'%Y\')+0 <= ?', 15)
                    ->whereRaw('year(das_keluarga.tgl_daftar)= ?', $yearl)
                    ->where('das_penduduk.pendidikan_kk_id', '=', 1);
                if ($did != 'ALL') {
                    $query_total_sltp->where('das_penduduk.desa_id', '=', $did);
                }
                $total_sltp = $query_total_sltp->count();

                //SMA
                $query_total_slta = DB::table('das_penduduk')
                    ->join('das_keluarga', 'das_penduduk.no_kk', '=', 'das_keluarga.no_kk')
                    ->leftJoin('ref_pendidikan_kk', 'das_penduduk.pendidikan_kk_id', '=', 'ref_pendidikan_kk.id')
                    ->where('das_penduduk.kecamatan_id', '=', $kid)
                    ->whereRaw('DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(das_penduduk.tanggal_lahir)), \'%Y\')+0 > ? ', 16)
                    ->whereRaw('DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(tanggal_lahir)), \'%Y\')+0 <= ?', 18)
                    ->whereRaw('year(das_keluarga.tgl_daftar)= ?', $yearl)
                    ->where('das_penduduk.pendidikan_kk_id', '=', 1);
                if ($did != 'ALL') {
                    $query_total_slta->where('das_penduduk.desa_id', '=', $did);
                }
                $total_slta = $query_total_slta->count();


                $data_pendidikan[] = [
                    'year' => $yearl,
                    'SD' => $total_sd,
                    'SLTP' => $total_sltp,
                    'SLTA' => $total_slta,
                ];
            }
        }else{
            // SD
            $query_total_sd = DB::table('das_penduduk')
                ->join('das_keluarga', 'das_penduduk.no_kk', '=', 'das_keluarga.no_kk')
                ->leftJoin('ref_pendidikan_kk', 'das_penduduk.pendidikan_kk_id', '=', 'ref_pendidikan_kk.id')
                ->where('das_penduduk.kecamatan_id', '=', $kid)
                ->whereRaw('DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(das_penduduk.tanggal_lahir)), \'%Y\')+0 > ? ', 6)
                ->whereRaw('DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(tanggal_lahir)), \'%Y\')+0 <= ?', 12)
                ->whereRaw('year(das_keluarga.tgl_daftar)= ?', $year)
                ->where('das_penduduk.pendidikan_kk_id', '=', 1);
            if ($did != 'ALL') {
                $query_total_sd->where('das_penduduk.desa_id', '=', $did);
            }
            $total_sd = $query_total_sd->count();

            // SMP
            $query_total_sltp = DB::table('das_penduduk')
                ->join('das_keluarga', 'das_penduduk.no_kk', '=', 'das_keluarga.no_kk')
                ->leftJoin('ref_pendidikan_kk', 'das_penduduk.pendidikan_kk_id', '=', 'ref_pendidikan_kk.id')
                ->where('das_penduduk.kecamatan_id', '=', $kid)
                ->whereRaw('DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(das_penduduk.tanggal_lahir)), \'%Y\')+0 > ? ', 13)
                ->whereRaw('DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(tanggal_lahir)), \'%Y\')+0 <= ?', 15)
                ->whereRaw('year(das_keluarga.tgl_daftar)= ?', $year)
                ->where('das_penduduk.pendidikan_kk_id', '=', 1);
            if ($did != 'ALL') {
                $query_total_sltp->where('das_penduduk.desa_id', '=', $did);
            }
            $total_sltp = $query_total_sltp->count();

            //SMA
            $query_total_slta = DB::table('das_penduduk')
                ->join('das_keluarga', 'das_penduduk.no_kk', '=', 'das_keluarga.no_kk')
                ->leftJoin('ref_pendidikan_kk', 'das_penduduk.pendidikan_kk_id', '=', 'ref_pendidikan_kk.id')
                ->where('das_penduduk.kecamatan_id', '=', $kid)
                ->whereRaw('DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(das_penduduk.tanggal_lahir)), \'%Y\')+0 > ? ', 16)
                ->whereRaw('DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(tanggal_lahir)), \'%Y\')+0 <= ?', 18)
                ->whereRaw('year(das_keluarga.tgl_daftar)= ?', $year)
                ->where('das_penduduk.pendidikan_kk_id', '=', 1);
            if ($did != 'ALL') {
                $query_total_slta->where('das_penduduk.desa_id', '=', $did);
            }
            $total_slta = $query_total_slta->count();


            $data_pendidikan[] = [
                'year' => $year,
                'SD' => $total_sd,
                'SLTP' => $total_sltp,
                'SLTA' => $total_slta,
            ];
        }
        return $data_pendidikan;
    }

    public function getChartTingkatPendidikan()
    {
        $kid = request('kid');
        $did = request('did');
        $year = request('y');

        // Grafik Data TIngkat Pendidikan
        $data_pendidikan = array();
        if($year == 'ALL' && $did=='ALL'){
            foreach (years_list() as $yearl) {
                // SD
                $query_pendidikan = DB::table('das_tingkat_pendidikan')
                    ->where('tahun', '=', $yearl)
                    ->where('kecamatan_id', '=', $kid);

                $data_pendidikan[] = [
                    'year' => $yearl,
                    'tidak_tamat_sekolah' => $query_pendidikan->sum('tidak_tamat_sekolah'),
                    'tamat_sd' =>  $query_pendidikan->sum('tamat_sd'),
                    'tamat_smp' =>  $query_pendidikan->sum('tamat_smp'),
                    'tamat_sma' =>  $query_pendidikan->sum('tamat_sma'),
                    'tamat_diploma_sederajat' =>  $query_pendidikan->sum('tamat_diploma_sederajat'),
                ];
            }
        }elseif($year != "ALL" && $did=="ALL"){
            $data_tabel = array();
            // Quartal
            $desa = DataDesa::where('kecamatan_id', $kid)->get();
            foreach($desa as $value){
                $query_pendidikan = DB::table('das_tingkat_pendidikan')
                    ->selectRaw('sum(tidak_tamat_sekolah) as tidak_tamat_sekolah, sum(tamat_sd) as tamat_sd, sum(tamat_smp) as tamat_smp, sum(tamat_sma) as tamat_sma, sum(tamat_diploma_sederajat) as tamat_diploma_sederajat')
                   // ->whereRaw('bulan in ('.$this->getIdsQuartal($key).')')
                    ->where('tahun', $year)
                    ->where('desa_id', '=', $value->desa_id)
                    ->get()->first();

                $data_tabel[] = array(
                    'year' => $value->nama,
                    'tidak_tamat_sekolah' => intval($query_pendidikan->tidak_tamat_sekolah),
                    'tamat_sd' =>  intval($query_pendidikan->tamat_sd),
                    'tamat_smp' =>  intval($query_pendidikan->tamat_smp),
                    'tamat_sma' =>  intval($query_pendidikan->tamat_sma),
                    'tamat_diploma_sederajat' =>  intval($query_pendidikan->tamat_diploma_sederajat),
                );
            }

            $data_pendidikan = $data_tabel;

        } elseif($year != 'ALL' && $did != 'ALL'){
            $data_tabel = array();
            // Quartal
            foreach(semester() as $key=>$value){
                $query_pendidikan = DB::table('das_tingkat_pendidikan')
                    ->selectRaw('sum(tidak_tamat_sekolah) as tidak_tamat_sekolah, sum(tamat_sd) as tamat_sd, sum(tamat_smp) as tamat_smp, sum(tamat_sma) as tamat_sma, sum(tamat_diploma_sederajat) as tamat_diploma_sederajat')
                    ->whereRaw('bulan in ('.$this->getIdsSemester($key).')')
                    ->where('tahun', $year)
                    ->where('desa_id', '=', $did)
                    ->get()->first();

                //return $query_pendidikan;
                $data_tabel[] = array(
                    'year' => 'Semester '.$key,
                    'tidak_tamat_sekolah' => intval($query_pendidikan->tidak_tamat_sekolah),
                    'tamat_sd' =>  intval($query_pendidikan->tamat_sd),
                    'tamat_smp' =>  intval($query_pendidikan->tamat_smp),
                    'tamat_sma' =>  intval($query_pendidikan->tamat_sma),
                    'tamat_diploma_sederajat' =>  intval($query_pendidikan->tamat_diploma_sederajat),
                );
            }

            $data_pendidikan = $data_tabel;
        } elseif($year == 'ALL' && $did!='ALL'){
            foreach (years_list() as $yearl) {
                // SD
                $query_pendidikan = DB::table('das_tingkat_pendidikan')
                    ->where('tahun', '=', $yearl)
                    ->where('kecamatan_id', '=', $kid)
                    ->where('desa_id', $did);

                $data_pendidikan[] = [
                    'year' => $yearl,
                    'tidak_tamat_sekolah' => $query_pendidikan->sum('tidak_tamat_sekolah'),
                    'tamat_sd' =>  $query_pendidikan->sum('tamat_sd'),
                    'tamat_smp' =>  $query_pendidikan->sum('tamat_smp'),
                    'tamat_sma' =>  $query_pendidikan->sum('tamat_sma'),
                    'tamat_diploma_sederajat' =>  $query_pendidikan->sum('tamat_diploma_sederajat'),
                ];
            }
        }

        // Data Tabel AKI & AKB
        $tabel_kesehatan = array();


        return array(
            'grafik' => $data_pendidikan,
            'tabel' => $tabel_kesehatan
        );
    }

    public function getChartPutusSekolah()
    {
        $kid = request('kid');
        $did = request('did');
        $year = request('y');

        // Grafik Data Siswa PAUD
        $data_pendidikan = array();
        if($year == 'ALL' && $did=='ALL'){
            foreach (years_list() as $yearl) {
                // SD
                $query_pendidikan = DB::table('das_putus_sekolah')
                    ->where('tahun', '=', $yearl)
                    ->where('kecamatan_id', '=', $kid);

                $data_pendidikan[] = [
                    'year' => $yearl,
                    'siswa_paud' => $query_pendidikan->sum('siswa_paud'),
                    'anak_usia_paud' =>  $query_pendidikan->sum('anak_usia_paud'),
                    'siswa_sd' => $query_pendidikan->sum('siswa_sd'),
                    'anak_usia_sd' =>  $query_pendidikan->sum('anak_usia_sd'),
                    'siswa_smp' =>  $query_pendidikan->sum('siswa_smp'),
                    'anak_usia_smp' =>  $query_pendidikan->sum('anak_usia_smp'),
                    'siswa_sma' =>  $query_pendidikan->sum('siswa_sma'),
                    'anak_usia_sma' =>  $query_pendidikan->sum('anak_usia_sma'),
                ];
            }
        }elseif($year=='ALL' && $did != 'ALL'){
            foreach (years_list() as $yearl) {
                // SD
                $query_pendidikan = DB::table('das_putus_sekolah')
                    ->where('tahun', '=', $yearl)
                    ->where('kecamatan_id', '=', $kid)
                    ->where('desa_id', $did);

                $data_pendidikan[] = [
                    'year' => $yearl,
                    'siswa_paud' => $query_pendidikan->sum('siswa_paud'),
                    'anak_usia_paud' =>  $query_pendidikan->sum('anak_usia_paud'),
                    'siswa_sd' => $query_pendidikan->sum('siswa_sd'),
                    'anak_usia_sd' =>  $query_pendidikan->sum('anak_usia_sd'),
                    'siswa_smp' =>  $query_pendidikan->sum('siswa_smp'),
                    'anak_usia_smp' =>  $query_pendidikan->sum('anak_usia_smp'),
                    'siswa_sma' =>  $query_pendidikan->sum('siswa_sma'),
                    'anak_usia_sma' =>  $query_pendidikan->sum('anak_usia_sma'),
                ];
            }
        }elseif($year!='ALL' && $did == 'ALL'){
            $desa = DataDesa::where('kecamatan_id', $kid)->get();
            foreach ($desa as $value) {
                // SD
                $query_pendidikan = DB::table('das_putus_sekolah')
                    ->where('tahun', '=', $year)
                    ->where('kecamatan_id', '=', $kid)
                    ->where('desa_id', $value->desa_id);

                $data_pendidikan[] = [
                    'year' => $value->nama,
                    'siswa_paud' => $query_pendidikan->sum('siswa_paud'),
                    'anak_usia_paud' =>  $query_pendidikan->sum('anak_usia_paud'),
                    'siswa_sd' => $query_pendidikan->sum('siswa_sd'),
                    'anak_usia_sd' =>  $query_pendidikan->sum('anak_usia_sd'),
                    'siswa_smp' =>  $query_pendidikan->sum('siswa_smp'),
                    'anak_usia_smp' =>  $query_pendidikan->sum('anak_usia_smp'),
                    'siswa_sma' =>  $query_pendidikan->sum('siswa_sma'),
                    'anak_usia_sma' =>  $query_pendidikan->sum('anak_usia_sma'),
                ];
            }
        }elseif($year != 'ALL' && $did != 'ALL'){
            $data_tabel = array();
            // Quartal
            foreach(semester() as $key=>$kuartal){
                $query_pendidikan = DB::table('das_putus_sekolah')
                    ->whereRaw('bulan in ('.$this->getIdsSemester($key).')')
                    ->where('tahun', $year)
                    ->where('desa_id', '=', $did);

                $data_tabel[] = array(
                    'year' => 'Semester '.$key,
                    'siswa_paud' => $query_pendidikan->sum('siswa_paud'),
                    'anak_usia_paud' =>  $query_pendidikan->sum('anak_usia_paud'),
                    'siswa_sd' => $query_pendidikan->sum('siswa_sd'),
                    'anak_usia_sd' =>  $query_pendidikan->sum('anak_usia_sd'),
                    'siswa_smp' =>  $query_pendidikan->sum('siswa_smp'),
                    'anak_usia_smp' =>  $query_pendidikan->sum('anak_usia_smp'),
                    'siswa_sma' =>  $query_pendidikan->sum('siswa_sma'),
                    'anak_usia_sma' =>  $query_pendidikan->sum('anak_usia_sma'),
                );
            }


            $data_pendidikan = $data_tabel;
        }

        // Data Tabel AKI & AKB
        $tabel_kesehatan = array();

        return array(
            'grafik' => $data_pendidikan,
            'tabel' => $tabel_kesehatan
        );
    }

    public  function getChartFasilitasPAUD()
    {
        $kid = request('kid');
        $did = request('did');
        $year = request('y');

        // Grafik Data Fasilitas PAUD
        $data_pendidikan = array();
        if($year == 'ALL'){
            foreach (years_list() as $yearl) {
                // SD
                $query_pendidikan = DB::table('das_fasilitas_paud')
                    ->where('tahun', '=', $yearl)
                    ->where('kecamatan_id', '=', $kid);
                if ($did != 'ALL') {
                    $query_pendidikan->where('desa_id', '=', $did);
                }

                $data_pendidikan[] = [
                    'year' => $yearl,
                    'jumlah_paud' => $query_pendidikan->sum('jumlah_paud'),
                    'jumlah_guru_paud' =>  $query_pendidikan->sum('jumlah_guru_paud'),
                    'jumlah_siswa_paud' =>  $query_pendidikan->sum('jumlah_siswa_paud'),
                ];
            }
        }else{
            $data_tabel = array();
            // Quartal
            foreach(semester() as $key=>$kuartal){
                $query_pendidikan = DB::table('das_fasilitas_paud')
                    ->whereRaw('bulan in ('.$this->getIdsSemester($key).')')
                    ->where('tahun', $year);
                if ($did != 'ALL') {
                    $query_pendidikan->where('desa_id', '=', $did);
                }
                $data_tabel[] = array(
                    'year' => 'Semester '.$key,
                    'jumlah_paud' => $query_pendidikan->sum('jumlah_paud'),
                    'jumlah_guru_paud' =>  $query_pendidikan->sum('jumlah_guru_paud'),
                    'jumlah_siswa_paud' =>  $query_pendidikan->sum('jumlah_siswa_paud'),
                );
            }


            $data_pendidikan = $data_tabel;
        }

        // Data Tabel AKI & AKB
        $tabel_kesehatan = array();

        // Kuartal & Detail Per Desa
        /*if($year!='ALL' && $did=='ALL'){
            $data_tabel = array();
            // Quartal
            foreach(kuartal_bulan() as $key=>$kuartal){
                $query = DB::table('das_akib')
                    ->whereRaw('bulan in ('.$this->getIdsQuartal($key).')')
                    ->where('tahun', $year);
                $data_tabel['quartal'][$key] = array(
                    'aki' => $query->sum('aki'),
                    'akb' => $query->sum('akb')
                );
            }

            // Detail Desa
            foreach(kuartal_bulan() as $key=>$kuartal){
                $query = DB::table('das_akib')
                    ->join('das_data_desa', 'das_akib.desa_id', '=', 'das_data_desa.desa_id')
                    ->selectRaw('das_data_desa.nama, sum(das_akib.aki) as aki, sum(das_akib.akb) as akb')
                    ->whereRaw('das_akib.bulan in ('.$this->getIdsQuartal($key).')')
                    ->where('das_akib.tahun', $year)
                    ->groupBy('das_data_desa.nama')->get();
                $data_tabel['desa'][$key] = $query;
            }


            $tabel_kesehatan = view('dashboard.kesehatan.tabel_akiakb_1', compact('data_tabel'))->render();
            //$tabel_kesehatan = $data_tabel;
        }elseif($year !='ALL' && $did != 'ALL'){
            $data_tabel = array();
            foreach(kuartal_bulan() as $key=>$kuartal){
                $query = DB::table('das_akib')
                    ->whereRaw('bulan in ('.$this->getIdsQuartal($key).')')
                    ->where('tahun', $year)
                    ->where('desa_id', $did);
                $data_tabel['quartal'][$key] = array(
                    'aki' => $query->sum('aki'),
                    'akb' => $query->sum('akb')
                );
            }

            $tabel_kesehatan = view('dashboard.kesehatan.tabel_akiakb_2', compact('data_tabel'))->render();
        }*/

        return array(
            'grafik' => $data_pendidikan,
            'tabel' => $tabel_kesehatan
        );
    }

    private function getIdsQuartal($q)
    {
        $quartal = kuartal_bulan()[$q];
        $ids = '';
        foreach($quartal as $key=>$val){
            $ids.=$key.',';
        }
        return rtrim($ids,',');
    }

    private function getIdsSemester($smt)
    {
        $semester = semester()[$smt];
        $ids = '';
        foreach($semester as $key=>$val){
            $ids.=$key.',';
        }
        return rtrim($ids,',');
    }
}
