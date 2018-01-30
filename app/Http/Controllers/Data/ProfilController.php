<?php

namespace App\Http\Controllers\Data;

use App\Models\Profil;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'Profil' ;
        return view('data.profil.index', compact('page_title'));
    }


    public function getDataProfil()
    {
        return DataTables::of(Profil::with(['Kecamatan', 'Kabupaten', 'Provinsi'])->get())
            ->addColumn( 'action', function ( $role ) {
                $edit_url = route('data.profil.edit', $role->id );
                $delete_url = route('data.profil.destroy', $role->id);

                $data['edit_url']   = $edit_url;
                $data['delete_url'] = $delete_url;

                return view('forms.action', $data);
            })
            ->make();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Buat Profil';
        $page_description = '';
        
        return view('data.profil.create', compact('page_title', 'page_description'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Save Request
        try{
            $profil = new Profil($request->input());
            request()->validate([
                'provinsi_id' => 'required',
                'kabupaten_id' => 'required',
                'kecamatan_id' => 'required',
                'alamat' => 'required',
                'kode_pos' => 'required',
                'email' => 'email',
                'nama_camat' => 'required',
            ]);
            $profil->save();
            return redirect()->route('data.profil.index')->with('success', 'Profil berhasil disimpan!');
        }catch (Exception $e){
            return back()->withInput()->with('error', 'Profil gagal disimpan!');
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
    }
}
