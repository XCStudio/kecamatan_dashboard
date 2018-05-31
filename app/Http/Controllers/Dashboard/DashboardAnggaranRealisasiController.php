<?php

namespace App\Http\Controllers\Dashboard;

use Counter;
use App\Http\Controllers\Controller;
use App\Models\Profil;
use Illuminate\Support\Facades\DB;

class DashboardAnggaranRealisasiController extends Controller
{
    //
    /**
     * Menampilkan Data Anggaran Dan realisasi Kecamatan
     **/
    public function showAnggaranDanRealisasi()
    {
        Counter::count('dashboard.anggaran-dan-realisasi');

        $data['page_title'] = 'Anggaran Dan realisasi Kecamatan';
        $data['page_description'] = 'Data Anggaran Dan realisasi Kecamatan';
        $defaultProfil = env('KD_DEFAULT_PROFIL', '1');
        $data['defaultProfil'] = $defaultProfil;
        $data['year_list'] = years_list();
        $data['list_kecamatan'] = Profil::with('kecamatan')->orderBy('kecamatan_id', 'desc')->get();
        /*$data['list_desa'] = DB::table('ref_desa')->select('*')->where('kecamatan_id', '=', $defaultProfil)->get();*/

        return view('dashboard.anggaran_realisasi.show_anggaran_realisasi')->with($data);
    }

    public function getChartAnggaranRealisasi()
    {
        $kid = request('kid');
        $year = request('y');

        // Grafik Data Pendidikan
        $data_pendidikan = array();
        if ($year == 'ALL') {
            $total_anggaran = 0;
            $total_belanja = 0;
            $belanja_pegawai = 0;
            $belanja_barang_jasa = 0;
            $belanja_modal = 0;
            $belanja_tidak_langsung = 0;

            foreach (array_sort(years_list()) as $yearls) {
                $query_result = DB::table('das_anggaran_realisasi')
                    ->select('*')
                    ->where('kecamatan_id', '=', $kid)
                    ->where('tahun', '=', $yearls)->first();

                if (count($query_result) > 0) {
                    $total_anggaran += $query_result->total_anggaran;
                    $total_belanja += $query_result->total_belanja;
                    $belanja_pegawai += $query_result->belanja_pegawai;
                    $belanja_barang_jasa += $query_result->belanja_barang_jasa;
                    $belanja_modal += $query_result->belanja_modal;
                    $belanja_tidak_langsung += $query_result->belanja_tidak_langsung;
                } else {
                    $total_anggaran += 0;
                    $total_belanja += 0;
                    $belanja_pegawai += 0;
                    $belanja_barang_jasa += 0;
                    $belanja_modal += 0;
                    $belanja_tidak_langsung += 0;
                }

            }

            $data_pendidikan['sum'] = [
                'total_belanja' => number_format($total_belanja),
                'total_belanja_persen' => number_format(($total_belanja / $total_anggaran) * 100, 1),

                'selisih_anggaran_realisasi' => number_format(0),
                'selisih_anggaran_realisasi_persen' => number_format(0),

                'belanja_pegawai' => number_format($belanja_pegawai),
                'belanja_pegawai_persen' => number_format(($belanja_pegawai / $total_belanja) * 100, 1)
                ,
                'belanja_barang_jasa' => number_format($belanja_barang_jasa),
                'belanja_barang_jasa_persen' => number_format(($belanja_barang_jasa / $total_belanja) * 100, 1),

                'belanja_modal' => number_format($belanja_modal),
                'belanja_modal_persen' => number_format(($belanja_modal / $total_belanja) * 100, 1),

                'belanja_tidak_langsung' => number_format($belanja_tidak_langsung),
                'belanja_tidak_langsung_persen' => number_format(($belanja_tidak_langsung / $total_belanja) * 100, 1),
            ];
            $data_pendidikan['chart'] = [
                [
                    'anggaran' => 'Belanja Pegawai',
                    'value' => number_format(($belanja_pegawai / $total_belanja) * 100, 1)
                ],
                [
                    'anggaran' => 'Belanja Barang dan Jasa',
                    'value' => number_format(($belanja_barang_jasa / $total_belanja) * 100, 1),
                ],
                [
                    'anggaran' => 'Belanja Modal',
                    'value' => number_format(($belanja_modal / $total_belanja) * 100, 1),
                ],
                [
                    'anggaran' => 'Belanja Tidak Langsung',
                    'value' => number_format(($belanja_tidak_langsung / $total_belanja) * 100, 1),
                ],
            ];

        } else {
            $total_anggaran = 0;
            $total_belanja = 0;
            $belanja_pegawai = 0;
            $belanja_barang_jasa = 0;
            $belanja_modal = 0;
            $belanja_tidak_langsung = 0;


            $query_result = DB::table('das_anggaran_realisasi')
                ->select('*')
                ->where('kecamatan_id', '=', $kid)
                ->where('tahun', '=', $year)->first();

            if (count($query_result) > 0) {
                $total_anggaran = $query_result->total_anggaran;
                $total_belanja = $query_result->total_belanja;
                $belanja_pegawai = $query_result->belanja_pegawai;
                $belanja_barang_jasa = $query_result->belanja_barang_jasa;
                $belanja_modal = $query_result->belanja_modal;
                $belanja_tidak_langsung = $query_result->belanja_tidak_langsung;
            }

            $data_pendidikan['sum'] = [
                'total_belanja' => number_format($total_belanja),
                'total_belanja_persen' => number_format(($total_belanja / $total_anggaran) * 100, 1),

                'selisih_anggaran_realisasi' => number_format(0),
                'selisih_anggaran_realisasi_persen' => number_format(0),

                'belanja_pegawai' => number_format($belanja_pegawai),
                'belanja_pegawai_persen' => number_format(($belanja_pegawai / $total_belanja) * 100, 1)
                ,
                'belanja_barang_jasa' => number_format($belanja_barang_jasa),
                'belanja_barang_jasa_persen' => number_format(($belanja_barang_jasa / $total_belanja) * 100, 1),

                'belanja_modal' => number_format($belanja_modal),
                'belanja_modal_persen' => number_format(($belanja_modal / $total_belanja) * 100, 1),

                'belanja_tidak_langsung' => number_format($belanja_tidak_langsung),
                'belanja_tidak_langsung_persen' => number_format(($belanja_tidak_langsung / $total_belanja) * 100, 1),
            ];
            $data_pendidikan['chart'] = [
                [
                    'anggaran' => 'Belanja Pegawai',
                    'value' => number_format(($belanja_pegawai / $total_belanja) * 100, 1)
                ],
                [
                    'anggaran' => 'Belanja Barang dan Jasa',
                    'value' => number_format(($belanja_barang_jasa / $total_belanja) * 100, 1),
                ],
                [
                    'anggaran' => 'Belanja Modal',
                    'value' => number_format(($belanja_modal / $total_belanja) * 100, 1),
                ],
                [
                    'anggaran' => 'Belanja Tidak Langsung',
                    'value' => number_format(($belanja_tidak_langsung / $total_belanja) * 100, 1),
                ],
            ];
        }

        return $data_pendidikan;
    }
}
