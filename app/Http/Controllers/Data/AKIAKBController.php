<?php

namespace App\Http\Controllers\Data;

use App\Models\AkiAkb;
use App\Models\DataDesa;
use App\Models\Profil;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Excel;

class AKIAKBController extends Controller
{
    public $nama_kecamatan;
    public $bulan;
    public $tahun;

    public function __construct()
    {
        $this->nama_kecamatan = Profil::where('kecamatan_id', env('KD_DEFAULT_PROFIL', null))->first()->kecamatan->nama;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $page_title = 'AKI & AKB';
        $page_description = 'Data Kematian Ibu & Bayi Kecamatan '.$this->nama_kecamatan;
        return view('data.aki_akb.index', compact('page_title', 'page_description'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataAKIAKB()
    {
        //
        return DataTables::of(AkiAkb::with(['desa'])->select('*')->get())
            ->addColumn('actions', function ($row) {
                $edit_url = route('data.aki-akb.edit', $row->id);
                $delete_url = route('data.aki-akb.destroy', $row->id);

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
        $page_description = 'Import Data AKI & AKB';
        $years_list = years_list();
        $months_list = months_list();
        return view('data.aki_akb.import', compact('page_title', 'page_description', 'kecamatan_id', 'list_desa', 'years_list', 'months_list'));
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
                                'bulan' => $bulan,
                                'tahun' => $tahun,
                                'aki' => $v['jumlah_aki'],
                                'akb' => $v['jumlah_akb'],
                            ];
                        }
                    }
                }

                if (!empty($insert)) {
                    AkiAkb::insert($insert);
                    return back()->with('success', 'Import data sukses.');
                }

            }
        }else{
            return back()->with('error', 'Import data gagal. Data sudah pernah diimport.');
        }
    }

    protected function uploadValidation($bulan, $tahun){
        return !AkiAkb::where('bulan',$bulan)->where('tahun', $tahun)->exists();
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
        $akib = AkiAkb::findOrFail($id);
        $page_title = 'Ubah';
        $page_description = 'Ubah Proses KK : '.$akib->id;

        return view('data.aki_akb.edit', compact('page_title', 'page_description', 'akib'));
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
                'penduduk_id' => 'required',
                'alamat' => 'required',
                'tanggal_pengajuan'=>'required|date',
                'status' => 'required',
            ]);

            AkiAkb::find($id)->update($request->all());

            return redirect()->route('data.proses-kk.index')->with('success', 'Data Proses KK Baru berhasil disimpan!');
        }catch (Exception $e){
            return back()->withInput()->with('error', 'Data Proses KK gagal disimpan!');
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
            AkiAkb::findOrFail($id)->delete();

            return redirect()->route('data.aki-akb.index')->with('success', 'Data sukses dihapus!');

        } catch (Exception $e) {
            return redirect()->route('data.aki-akb.index')->with('error', 'Data gagal dihapus!');
        }
    }
}
