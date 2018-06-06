<?php

namespace App\Http\Controllers\Data;

use App\Models\Kecamatan;
use App\Models\PutusSekolah;
use Doctrine\DBAL\Driver\Mysqli\MysqliException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Yajra\DataTables\DataTables;
use Excel;

class PutusSekolahController extends Controller
{
    //
    public function index()
    {
        //
        $kecamatan = Kecamatan::find(env('KD_DEFAULT_PROFIL', null));
        $page_title = 'Anak Putus Sekolah';
        $page_description = 'Data Anak Putus Sekolah Kecamatan '.$kecamatan->nama_kecamatan;
        return view('data.putus_sekolah.index', compact('page_title', 'page_description'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataPutusSekolah()
    {
        //
        return DataTables::of(PutusSekolah::with(['desa'])->select('*')->get())
            ->addColumn('actions', function ($row) {
                $edit_url = route('data.putus-sekolah.edit', $row->id);
                $delete_url = route('data.putus-sekolah.destroy', $row->id);

                $data['edit_url'] = $edit_url;
                $data['delete_url'] = $delete_url;

                return view('forms.action', $data);
            })
            ->editColumn('desa_id', function($row){
                return $row->desa->nama;
            })
            ->editColumn('bulan', function($row){
                return months_list()[$row->bulan];
            })
            ->rawColumns(['actions'])->make();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import()
    {
        //
        $page_title = 'Import';
        $page_description = 'Import Data Anak Putus Sekolah';
        $years_list = years_list();
        $months_list = months_list();
        return view('data.putus_sekolah.import', compact('page_title', 'page_description', 'list_desa', 'years_list', 'months_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function do_import(Request $request)
    {
        //
        ini_set('max_execution_time', 300);
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        if ($request->hasFile('file') && $this->uploadValidation($bulan, $tahun)) {

            try{
                $path = Input::file('file')->getRealPath();

                $data = Excel::load($path, function ($reader) {
                })->get();

                if (!empty($data) && $data->count()) {


                    foreach ($data->toArray() as $key => $value) {
                        if (!empty($value)) {
                            foreach ($value as $v) {
                                $insert[] = [
                                    'kecamatan_id' => env('KD_DEFAULT_PROFIL', null),
                                    'desa_id' => $v['desa_id'],
                                    'siswa_paud' => $v['siswa_paud'],
                                    'anak_usia_paud' => $v['anak_usia_paud'],
                                    'siswa_sd' => $v['siswa_sd'],
                                    'anak_usia_sd' => $v['anak_usia_sd'],
                                    'siswa_smp' => $v['siswa_smp'],
                                    'anak_usia_smp' => $v['anak_usia_smp'],
                                    'siswa_sma' => $v['siswa_sma'],
                                    'anak_usia_sma' => $v['anak_usia_sma'],
                                    'bulan' => $bulan,
                                    'tahun' => $tahun,
                                ];
                            }
                        }
                    }

                    if (!empty($insert)) {
                        try{
                            PutusSekolah::insert($insert);
                            return back()->with('success', 'Import data sukses.');
                        }catch (QueryException $ex){
                            return back()->with('error', 'Import data gagal. '.$ex->getCode());
                        }
                    }
                }
            }catch (\Exception $ex){
                return back()->with('error', 'Import data gagal. '.$ex->getMessage());
            }

        }else{
            return back()->with('error', 'Import data gagal. Data sudah pernah diimport.');
        }
    }

    protected function uploadValidation($bulan, $tahun){
        return !PutusSekolah::where('bulan',$bulan)->where('tahun', $tahun)->exists();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $siswa = PutusSekolah::findOrFail($id);
        $page_title = 'Ubah';
        $page_description = 'Ubah Data Anak Putus Sekolah';
        return view('data.putus_sekolah.edit', compact('page_title', 'page_description', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try{
            request()->validate([
                'siswa_paud' => 'required',
                'anak_usia_paud' => 'required',
                'siswa_sd' => 'required',
                'anak_usia_sd' => 'required',
                'siswa_smp' => 'required',
                'anak_usia_smp' => 'required',
                'siswa_sma' => 'required',
                'anak_usia_sma' => 'required',
                'bulan' => 'required',
                'tahun' => 'required',
            ]);

            PutusSekolah::find($id)->update($request->all());

            return redirect()->route('data.putus-sekolah.index')->with('success', 'Data berhasil disimpan!');
        }catch (Exception $e){
            return back()->withInput()->with('error', 'Data gagal disimpan!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            PutusSekolah::findOrFail($id)->delete();

            return redirect()->route('data.putus-sekolah.index')->with('success', 'Data sukses dihapus!');

        } catch (Exception $e) {
            return redirect()->route('data.putus-sekolah.index')->with('error', 'Data gagal dihapus!');
        }
    }
}
