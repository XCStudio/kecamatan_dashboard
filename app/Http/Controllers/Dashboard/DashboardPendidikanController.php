<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Profil;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Counter;

class DashboardPendidikanController extends Controller
{
    //
    /**
     * Menampilkan Data Pendidikan
     **/
    public function showPendidikan()
    {
        Counter::count('dashboard.pendidikan');

        $data['page_title'] = 'Pendidikan';
        $data['page_description'] = 'Data Tingkat Pendidikan Kecamatan';
        $defaultProfil = env('KD_DEFAULT_PROFIL', '1');
        $data['defaultProfil'] = $defaultProfil;
        $data['year_list'] = years_list();
        $data['list_kecamatan'] = Profil::with('kecamatan')->orderBy('kecamatan_id', 'desc')->get();
        $data['list_desa'] = DB::table('ref_desa')->select('*')->where('kecamatan_id', '=', $defaultProfil)->get();

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
}
