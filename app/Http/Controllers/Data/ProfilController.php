<?php

namespace App\Http\Controllers\Data;

use App\Models\DataUmum;
use App\Models\Profil;
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
        $page_title = 'Profil';
        return view('data.profil.index', compact('page_title'));
    }


    public function getDataProfil()
    {
        return DataTables::of(Profil::with(['Kecamatan', 'Kabupaten', 'Provinsi'])->get())
            ->addColumn('action', function ($data) {
                $edit_url = route('data.profil.edit', $data->id);
                $delete_url = route('data.profil.destroy', $data->id);

                $data['edit_url'] = $edit_url;
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
        $profil = new Profil();


        return view('data.profil.create', compact('page_title', 'page_description', 'profil'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Save Request
        try {
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

            if ($request->hasFile('file_struktur_organisasi')) {
                $file       = $request->file('file_struktur_organisasi');
                $fileName   = $file->getClientOriginalName();
                $request->file('file_struktur_organisasi')->move("storage/profil/struktur_organisasi/", $fileName);
                $profil->file_struktur_organisasi = 'storage/profil/struktur_organisasi/'.$fileName;
            }

            if($profil->save())
                DataUmum::create(['kecamatan_id'=>$profil->kecamatan_id, 'embed_peta' => 'Edit Peta Pada Menu Data Umum.']);
            return redirect()->route('data.profil.success', $profil->dataumum->id)->with('success', 'Profil berhasil disimpan!');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Profil gagal disimpan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profil = Profil::findOrFail($id);
        if($profil->file_struktur_organisasi == ''){
            $profil->file_struktur_organisasi = 'http://placehold.it/600x400';
        }
        $page_title = 'Ubah';
        $page_description = 'Ubah Profil: ' . $profil->kecamatan->nama;


        return view('data.profil.edit', compact('page_title', 'page_description', 'profil'));
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

        try {
            $profil = Profil::where('id', $id)->first();
            $profil->fill($request->all());



            if($request->file('file_struktur_organisasi') == "")
            {
                $profil->file_struktur_organisasi = $profil->file_struktur_organisasi;
            }
            else
            {
                $file       = $request->file('file_struktur_organisasi');
                $fileName   = $file->getClientOriginalName();
                $request->file('file_struktur_organisasi')->move("storage/profil/struktur_organisasi/", $fileName);
                $profil->file_struktur_organisasi = 'storage/profil/struktur_organisasi/'.$fileName;
            }

            request()->validate([
                'provinsi_id' => 'required',
                'kabupaten_id' => 'required',
                'kecamatan_id' => 'required',
                'alamat' => 'required',
                'kode_pos' => 'required',
                'email' => 'email',
                'nama_camat' => 'required',
            ]);

            $profil->update();

            return redirect()->route('data.profil.success', $profil->dataumum->id)->with('success', 'Update Profil sukses!');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Update Profil gagal!');
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
        try {
            Profil::findOrFail($id)->delete();

            return redirect()->route('data.profil.index')->with('success', 'Profil sukses dihapus!');

        } catch (Exception $e) {
            return redirect()->route('data.profil.index')->with('error', 'Profil gagal dihapus!');
        }
    }

    /**
     * Redirect to edit Data Umum if success
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function success($id)
    {
        $page_title = 'Konfirmasi?';
        $page_description = '';
        return view('data.profil.save_success', compact('id', 'page_title', 'page_description'));
    }
}
