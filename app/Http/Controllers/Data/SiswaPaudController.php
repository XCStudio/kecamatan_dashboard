<?php

namespace App\Http\Controllers\Data;

use App\Models\Kecamatan;
use App\Models\SiswaPAUD;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Yajra\DataTables\DataTables;
use Excel;

class SiswaPaudController extends Controller
{
    //
    public function index()
    {
        //
        $kecamatan = Kecamatan::find(env('KD_DEFAULT_PROFIL', null));
        $page_title = 'Siswa PAUD';
        $page_description = 'Data Siswa PAUD Kecamatan '.$kecamatan->nama_kecamatan;
        return view('data.siswa_paud.index', compact('page_title', 'page_description'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataSiswaPAUD()
    {
        //
        return DataTables::of(SiswaPAUD::with(['desa'])->select('*')->get())
            ->addColumn('actions', function ($row) {
                $edit_url = route('data.siswa-paud.edit', $row->id);
                $delete_url = route('data.siswa-paud.destroy', $row->id);

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
        $page_description = 'Import Data Siswa PAUD';
        $years_list = years_list();
        $months_list = months_list();
        return view('data.siswa_paud.import', compact('page_title', 'page_description', 'list_desa', 'years_list', 'months_list'));
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
                                'bulan' => $bulan,
                                'tahun' => $tahun,
                            ];
                        }
                    }
                }

                if (!empty($insert)) {
                    SiswaPAUD::insert($insert);
                    return back()->with('success', 'Import data sukses.');
                }

            }
        }else{
            return back()->with('error', 'Import data gagal. Data sudah pernah diimport.');
        }
    }

    protected function uploadValidation($bulan, $tahun){
        return !SiswaPAUD::where('bulan',$bulan)->where('tahun', $tahun)->exists();
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
        $siswa = SiswaPAUD::findOrFail($id);
        $page_title = 'Ubah';
        $page_description = 'Ubah Data Siswa PAUD';
        return view('data.siswa_paud.edit', compact('page_title', 'page_description', 'siswa'));
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
                'bulan' => 'required',
                'tahun' => 'required',
            ]);

            SiswaPAUD::find($id)->update($request->all());

            return redirect()->route('data.siswa-paud.index')->with('success', 'Data berhasil disimpan!');
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
            SiswaPAUD::findOrFail($id)->delete();

            return redirect()->route('data.siswa-paud.index')->with('success', 'Data sukses dihapus!');

        } catch (Exception $e) {
            return redirect()->route('data.siswa-paud.index')->with('error', 'Data gagal dihapus!');
        }
    }
}
