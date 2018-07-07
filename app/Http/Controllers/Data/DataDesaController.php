<?php

namespace App\Http\Controllers\Data;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataDesa;
use App\Models\Profil;
use Yajra\DataTables\DataTables;

class DataDesaController extends Controller
{
    //
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $page_title = 'Data Desa';
        $page_description = 'Daftar Desa';

        return view('data.data_desa.index', compact('page_title', 'page_description'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $page_title = 'Tambah';
        $page_description = 'Tambah Data Desa';
        $list_kecamatan = Profil::with('kecamatan')->orderBy('kecamatan_id', 'desc')->get();
        $defaultProfil = env('KD_DEFAULT_PROFIL','1');
        return view('data.data_desa.create', compact('page_title', 'page_description', 'list_kecamatan', 'defaultProfil'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try{
                      
            $desa = new DataDesa();
            $desa->fill($request->all());
            $desa->kecamatan_id = env('KD_DEFAULT_PROFIL', NULL);
          
            request()->validate([
                'desa_id' => 'required',
                'nama' => 'required',
                'website' => 'required',
                'luas_wilayah' => 'required'
            ]);

            
            $desa->save();          

            return redirect()->route('data.data-desa.index')->with('success', 'Data Desa berhasil disimpan!');
        }catch (Exception $e){
            return back()->withInput()->with('error', 'Data Desa gagal disimpan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $desa = DataDesa::findOrFail($id);
        $page_title = 'Ubah';
        $page_description = 'Ubah Data Desa : '.$desa->nama;
        $list_kecamatan = Profil::with('kecamatan')->orderBy('kecamatan_id', 'desc')->get();
        $defaultProfil = env('KD_DEFAULT_PROFIL','1');
        return view('data.data_desa.edit', compact('page_title', 'page_description', 'desa', 'list_kecamatan', 'defaultProfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $desa = DataDesa::findOrFail($id);
        $desa->fill($request->all());
        $desa->kecamatan_id = env('KD_DEFAULT_PROFIL', NULL);
        try{           
          
            request()->validate([
                'desa_id' => 'required',
                'nama' => 'required',
                'website' => 'required',
                'luas_wilayah' => 'required'
            ]);

            
            $desa->save();          

            return redirect()->route('data.data-desa.index')->with('success', 'Data Desa berhasil disimpan!');
        }catch (Exception $e){
            return back()->withInput()->with('error', 'Data Desa gagal disimpan!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            DataDesa::findOrFail($id)->delete();

            return redirect()->route('data.data-desa.index')->with('success', 'Data Desa sukses dihapus!');

        } catch (Exception $e) {
            return redirect()->route('data.data-desa.index')->with('error', 'Data Desa gagal dihapus!');
        }
    }

    public function getDataDesa()
    {
        return DataTables::of(DataDesa::select(['id', 'desa_id', 'nama', 'website', 'luas_wilayah'])->get())
            ->addColumn('action', function ($row) {
                $edit_url = route('data.data-desa.edit', $row->id);
                $delete_url = route('data.data-desa.destroy', $row->id);

                $data['edit_url'] = $edit_url;
                $data['delete_url'] = $delete_url;

                return view('forms.action', $data);
            })
            ->editColumn('website', function($row){
                                
                return '<a href="'.$row->website.'" target="_blank">'.$row->website.'</a>';
            })
            ->rawColumns(['website', 'action'])->make();
    }
}
