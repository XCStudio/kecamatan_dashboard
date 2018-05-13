<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Kecamatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardKesehatanController extends Controller
{
    private $kecamatan_id;
    private $nama_kecamatan;

    public function __construct()
    {
        $this->kecamatan_id = env('KD_DEFAULT_PROFIL', null);
        $this->nama_kecamatan = Kecamatan::findOrFail($this->kecamatan_id)->nama;
    }

    //
    public function showKesehatan()
    {
        $defaultProfil = $this->kecamatan_id;
        $page_title = 'Kesehatan';
        $page_description = 'Data Kesehatan Kecamatan ';
        $year_list = years_list();
        $list_desa = DB::table('das_data_desa')->select('*')->where('kecamatan_id', '=', $defaultProfil)->get();
        return view('dashboard.kesehatan.show_kesehatan', compact('page_title', 'page_description', 'defaultProfil', 'year_list', 'list_desa'));
    }

    public function getChartAKIAKB()
    {
        $kid = request('kid');
        $did = request('did');
        $year = request('y');
        $data = array();

        // Grafik Data Kesehatan AKI & AKB
        $data_kesehatan = array();
        if($year == 'ALL'){
            foreach (years_list() as $yearl) {
                // SD
                $query_aki = DB::table('das_akib')
                    ->where('tahun', '=', $yearl)
                    ->where('kecamatan_id', '=', $kid);
                if ($did != 'ALL') {
                    $query_aki->where('desa_id', '=', $did);
                }
                $aki = $query_aki->sum('aki');
                $akb = $query_aki->sum('akb');

                $data_kesehatan[] = [
                    'year' => $yearl,
                    'aki' => $aki,
                    'akb' =>  $akb,
                ];
            }
        }else{
            $query_aki = DB::table('das_akib')
                ->where('tahun', '=', $year)
                ->where('kecamatan_id', '=', $kid);
            if ($did != 'ALL') {
                $query_aki->where('desa_id', '=', $did);
            }
            $aki = $query_aki->sum('aki');
            $akb = $query_aki->sum('akb');

            $data_kesehatan[] = [
                'year' => $year,
                'aki' => $aki,
                'akb' =>  $akb,
            ];
        }

        // Data Tabel AKI & AKB
        $tabel_kesehatan = array();

        // Kuartal & Detail Per Desa
        if($year!='ALL' && $did=='ALL'){
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
        }

        return array(
            'grafik' => $data_kesehatan,
            'tabel' => $tabel_kesehatan
        );
    }

    public function getIdsQuartal($key)
    {
        $quartal = kuartal_bulan()[$key];
        $return = '';
        foreach($quartal as $key=>$val){
            $return.=$key.',';
        }
        return rtrim($return,',');
    }
}
