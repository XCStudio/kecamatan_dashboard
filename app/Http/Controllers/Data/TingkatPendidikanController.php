<?php

namespace App\Http\Controllers\Data;

use App\Models\Kecamatan;
use App\Models\TingkatPendidikan;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Yajra\DataTables\DataTables;
use Excel;

class TingkatPendidikanController extends Controller
{
    //
    public function index()
    {
        //
        $kecamatan = Kecamatan::find(env('KD_DEFAULT_PROFIL', null));
        $page_title = 'Tingkat Pendidikan';
        $page_description = 'Data Tingkat Pendidikan Kecamatan '.$kecamatan->nama_kecamatan;
        return view('data.tingkat_pendidikan.index', compact('page_title', 'page_description'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataTingkatPendidikan()
    {
        //
        return DataTables::of(TingkatPendidikan::with(['desa'])->select('*')->get())
            ->addColumn('actions', function ($row) {
                $edit_url = route('data.tingkat-pendidikan.edit', $row->id);
                $delete_url = route('data.tingkat-pendidikan.destroy', $row->id);

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
        $page_description = 'Import Data Tingkat Pendidikan';
        $years_list = years_list();
        $months_list = months_list();
        return view('data.tingkat_pendidikan.import', compact('page_title', 'page_description', 'list_desa', 'years_list', 'months_list'));
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
                                    'tidak_tamat_sekolah' => $v['tidak_tamat_sekolah'],
                                    'tamat_sd' => $v['tamat_sd'],
                                    'tamat_smp' => $v['tamat_smp'],
                                    'tamat_sma' => $v['tamat_sma'],
                                    'tamat_diploma_sederajat' => $v['tamat_diploma_sederajat'],
                                    'bulan' => $bulan,
                                    'tahun' => $tahun,
                                ];
                            }
                        }
                    }

                    if (!empty($insert)) {
                        try{
                            TingkatPendidikan::insert($insert);
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
        return !TingkatPendidikan::where('bulan',$bulan)->where('tahun', $tahun)->exists();
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
        $pendidikan = TingkatPendidikan::findOrFail($id);
        $page_title = 'Ubah';
        $page_description = 'Ubah Data Tingkat Pendidikan';
        return view('data.tingkat_pendidikan.edit', compact('page_title', 'page_description', 'pendidikan'));
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
                'tidak_tamat_sekolah' => 'required',
                'tamat_sd' => 'required',
                'tamat_smp' => 'required',
                'tamat_sma' => 'required',
                'tamat_diploma_sederajat' => 'required',
                'bulan' => 'required',
                'tahun' => 'required',
            ]);

            TingkatPendidikan::find($id)->update($request->all());

            return redirect()->route('data.tingkat-pendidikan.index')->with('success', 'Data berhasil disimpan!');
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
            TingkatPendidikan::findOrFail($id)->delete();

            return redirect()->route('data.tingkat-pendidikan.index')->with('success', 'Data sukses dihapus!');

        } catch (Exception $e) {
            return redirect()->route('data.tingkat-pendidikan.index')->with('error', 'Data gagal dihapus!');
        }
    }
}
