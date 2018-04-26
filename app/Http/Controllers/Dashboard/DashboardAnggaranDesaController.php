<?php

namespace App\Http\Controllers\Dashboard;

use Counter;
use App\Http\Controllers\Controller;
use App\Models\Profil;
use Illuminate\Support\Facades\DB;

class DashboardAnggaranDesaController extends Controller
{
    //
  /**
     * Menampilkan Data Anggaran Dan realisasi Kecamatan
     **/
    public function showAnggaranDesa()
    {
        Counter::count('dashboard.anggaran-desa');

        $data['page_title'] = 'APBDes';
        $data['page_description'] = 'Data Anggaran Desa';
        $defaultProfil = env('KD_DEFAULT_PROFIL', '1');
        $data['defaultProfil'] = $defaultProfil;
        $data['year_list'] = years_list();
        $data['list_kecamatan'] = Profil::with('kecamatan')->orderBy('kecamatan_id', 'desc')->get();
        $data['list_desa'] = DB::table('ref_desa')->select('*')->where('kecamatan_id', '=', $defaultProfil)->get();

        return view('dashboard.anggaran_desa.show_anggaran_desa')->with($data);
    }
  
  public function getChartAnggaranDesa()
    {
        $kid = request('kid');
        $did = request('did');
        $year = request('y');

        // Grafik Data Pendidikan
        $data_pendidikan = array();
    
        // Atribut data anggaran desa
        $total_pendapatan = 0;
        $total_belanja = 0;
        $in_dd = 0;
        $in_dd_persen = 0;
    
        $in_add = 0;
        $in_add_persen = 0;
    
        $in_pad = 0;
        $in_pad_persen = 0;
    
        $in_bhpr = 0;
        $in_bhpr_persen = 0;
    
        $in_bantuan_kabupaten = 0;  
        $in_bantuan_kabupaten_persen = 0;
    
        $in_bantuan_provinsi = 0;   
        $in_bantuan_provinsi_persen = 0;
        
        
    
        if($year=='ALL'){
            foreach (array_sort(years_list()) as $yearls) {
                $query_result = DB::table('das_anggaran_desa')
                    ->select('*')
                    ->where('das_anggaran_desa.kecamatan_id', '=', $kid);
                if($did != 'ALL') {
                    $query_result->where('das_anggaran_desa.desa_id', '=', $did);
                }
                $result = $query_result->get();
                $total_pendapatan = $query_result->sum('in_dd') + $query_result->sum('in_add') + $query_result->sum('in_pad') + $query_result->sum('in_bhpr') + $query_result->sum('in_bantuan_kabupaten') + $result->sum('in_bantuan_provinsi');
                $in_dd = $query_result->sum('in_dd');
                $in_add = $query_result->sum('in_add');
                $in_pad = $query_result->sum('in_pad');
                $in_bhpr = $query_result->sum('in_bhpr') ;
                $in_bantuan_kabupaten = $query_result->sum('in_bantuan_kabupaten') ;
                $in_bantuan_provinsi = $query_result->sum('in_bantuan_provinsi');
                $total_belanja = $query_result->sum('out_penyelenggaraan_pemerintahan') + $query_result->sum('out_pembangunan') + $query_result->sum('out_pembinaan_masyarakat') + $query_result->sum('out_pemberdayaan_masyarakat') + $query_result->sum('out_tak_terduga') + $query_result->sum('out_silpa');
            }
          if($in_dd != 0){
            $in_dd_persen = ($total_pendapatan / $in_dd) * 100;
          }
          if($in_add != 0){
             $in_add_persen = ($total_pendapatan / $in_add) * 100;
          }
          if($in_pad != 0){
            $in_pad_persen = ($total_pendapatan / $in_pad) * 100;
          }
          if($in_bhpr != 0){
            $in_bhpr_persen = ($total_pendapatan / $in_bhpr) * 100;
          }
          if($in_bantuan_kabupaten != 0){
            $in_bantuan_kabupaten_persen = ($total_pendapatan / $in_bantuan_kabupaten) * 100;
          }
          if($in_bantuan_provinsi != 0){
            $in_bantuan_provinsi_persen = ($total_pendapatan / $in_bantuan_provinsi) * 100;
          }
            $data_pendidikan['sum'] = [
                        'total_pendapatan' =>  number_format($total_pendapatan),

                        'in_dd' => number_format($in_dd),
                        'in_dd_persen' => number_format($in_dd_persen),

                        'in_add' =>  number_format($in_add),
                        'in_add_persen' =>  number_format($in_add_persen),
                       
                        'in_pad' =>  number_format($in_pad),
                        'in_pad_persen' =>  number_format($in_pad_persen),

                        'in_bhpr' =>  number_format($in_bhpr),
                        'in_bhpr_persen' =>  number_format($in_bhpr_persen),

                        'in_bantuan_kabupaten' =>  number_format($in_bantuan_kabupaten),
                        'in_bantuan_kabupaten_persen' =>  number_format($in_bantuan_kabupaten_persen),
              
                        'in_bantuan_provinsi' =>  number_format($in_bantuan_provinsi),
                        'in_bantuan_provinsi_persen' =>  number_format($in_bantuan_provinsi_persen),
              
                        'total_belanja' => number_format($total_belanja),
                    ];

          
          
          $data_pendidikan['chart'] = [
              [
                'anggaran' => 'Penyelengaraan Pemerintahan',
                'value' => $query_result->sum('out_penyelenggaraan_pemerintahan'),
              ],
            [
              'anggaran' => 'Pembangunan',
                'value' => $query_result->sum('out_pembangunan'),
            ],
             [
              'anggaran' => ' Pembinaan Masyarakat',
                'value' => $query_result->sum('out_pembinaan_masyarakat'),
            ],
             [
              'anggaran' => 'Pemberdayaan Masyarakat',
                'value' => $query_result->sum('out_pemberdayaan_masyarakat'),
            ],
             [
              'anggaran' => 'Tak Terduga',
                'value' => $query_result->sum('out_tak_terduga'),
            ],
             [
              'anggaran' => 'Silpa',
                'value' => $query_result->sum('out_silpa'),
            ],
              
            
          ];
        }else{
           $query_result = DB::table('das_anggaran_desa')
                    ->select('*')
                    ->where('das_anggaran_desa.kecamatan_id', '=', $kid)
                    ->where('das_anggaran_desa.tahun', '=', $year);
                if($did != 'ALL') {
                    $query_result->where('das_anggaran_desa.desa_id', '=', $did);
                }
                $result = $query_result->get();
                $total_pendapatan = $query_result->sum('in_dd') + $query_result->sum('in_add') + $query_result->sum('in_pad') + $query_result->sum('in_bhpr') + $query_result->sum('in_bantuan_kabupaten') + $result->sum('in_bantuan_provinsi');
                $in_dd = $query_result->sum('in_dd');
                $in_add = $query_result->sum('in_add');
                $in_pad = $query_result->sum('in_pad');
                $in_bhpr = $query_result->sum('in_bhpr') ;
                $in_bantuan_kabupaten = $query_result->sum('in_bantuan_kabupaten') ;
                $in_bantuan_provinsi = $query_result->sum('in_bantuan_provinsi');
                $total_belanja = $query_result->sum('out_penyelenggaraan_pemerintahan') + $query_result->sum('out_pembangunan') + $query_result->sum('out_pembinaan_masyarakat') + $query_result->sum('out_pemberdayaan_masyarakat') + $query_result->sum('out_tak_terduga') + $query_result->sum('out_silpa');
          
          if($in_dd != 0){
            $in_dd_persen = ($total_pendapatan / $in_dd) * 100;
          }
          if($in_add != 0){
             $in_add_persen = ($total_pendapatan / $in_add) * 100;
          }
          if($in_pad != 0){
            $in_pad_persen = ($total_pendapatan / $in_pad) * 100;
          }
          if($in_bhpr != 0){
            $in_bhpr_persen = ($total_pendapatan / $in_bhpr) * 100;
          }
          if($in_bantuan_kabupaten != 0){
            $in_bantuan_kabupaten_persen = ($total_pendapatan / $in_bantuan_kabupaten) * 100;
          }
          if($in_bantuan_provinsi != 0){
            $in_bantuan_provinsi_persen = ($total_pendapatan / $in_bantuan_provinsi) * 100;
          }
            $data_pendidikan['sum'] = [
                        'total_pendapatan' =>  number_format($total_pendapatan),

                        'in_dd' => number_format($in_dd),
                        'in_dd_persen' => number_format($in_dd_persen),

                        'in_add' =>  number_format($in_add),
                        'in_add_persen' =>  number_format($in_add_persen),
                       
                        'in_pad' =>  number_format($in_pad),
                        'in_pad_persen' =>  number_format($in_pad_persen),

                        'in_bhpr' =>  number_format($in_bhpr),
                        'in_bhpr_persen' =>  number_format($in_bhpr_persen),

                        'in_bantuan_kabupaten' =>  number_format($in_bantuan_kabupaten),
                        'in_bantuan_kabupaten_persen' =>  number_format($in_bantuan_kabupaten_persen),
              
                        'in_bantuan_provinsi' =>  number_format($in_bantuan_provinsi),
                        'in_bantuan_provinsi_persen' =>  number_format($in_bantuan_provinsi_persen),
              
                        'total_belanja' => number_format($total_belanja)
                    ];
          
           $data_pendidikan['chart'] = [
              [
                'anggaran' => 'Penyelengaraan Pemerintahan',
                'value' => $query_result->sum('out_penyelenggaraan_pemerintahan'),
              ],
            [
              'anggaran' => 'Pembangunan',
                'value' => $query_result->sum('out_pembangunan'),
            ],
             [
              'anggaran' => ' Pembinaan Masyarakat',
                'value' => $query_result->sum('out_pembinaan_masyarakat'),
            ],
             [
              'anggaran' => 'Pemberdayaan Masyarakat',
                'value' => $query_result->sum('out_pemberdayaan_masyarakat'),
            ],
             [
              'anggaran' => 'Tak Terduga',
                'value' => $query_result->sum('out_tak_terduga'),
            ],
             [
              'anggaran' => 'Silpa',
                'value' => $query_result->sum('out_silpa'),
            ],
              
            
          ];
        }

        return $data_pendidikan;
    }

}
