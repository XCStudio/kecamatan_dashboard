<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Profil;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardPendidikanController extends Controller
{
    //
    /**
     * Menampilkan Data Pendidikan
     **/
    public function showPendidikan()
    {
        $data['page_title'] = 'Pendidikan';
        $data['page_description'] = 'Data Tingkat Pendidikan Kecamatan';
        $defaultProfil = env('DAS_DEFAULT_PROIFL', '1');
        $data['defaultProfil'] = $defaultProfil;
        $data['year_list'] = years_list();
        $data['list_kecamatan'] = Profil::with('kecamatan')->orderBy('kecamatan_id', 'desc')->get();
        $data['list_desa'] = DB::table('ref_desa')->select('*')->where('kecamatan_id', '=', $defaultProfil)->get();

        return view('dashboard.pendidikan.pendidikan')->with($data);
    }


    public function getChartPendidikanPenduduk()
    {
        $kid = request('kid');
        $did = request('did');
        $year = request('y');

        // Grafik Data Pendidikan
        $data_pendidikan = array();
        $pendidikan = DB::table('ref_pendidikan_kk')->orderBy('id')->get();

        foreach (years_list() as $year) {
            $item = array();
            foreach ($pendidikan as $val) {
                $query_total = DB::table('das_penduduk')
                    ->join('das_keluarga', 'das_penduduk.no_kk', '=', 'das_keluarga.no_kk')
                    ->leftJoin('ref_pendidikan_kk', 'das_penduduk.pendidikan_kk_id', '=', 'ref_pendidikan_kk.id')
                    ->where('das_penduduk.kecamatan_id', '=', $kid)
                    ->whereRaw('year(das_keluarga.tgl_daftar)= ?', $year)
                    ->where('das_penduduk.pendidikan_kk_id', '=', $val->id);
                if ($did != 'ALL') {
                    $query_total->where('das_penduduk.desa_id', '=', $did);
                }
                $total = $query_total->count();
                $item[] = array('level' => $val->nama, 'total' => $total);

            }
            $data_pendidikan[$year] = $item;
        }
        return $data_pendidikan;
    }
}
