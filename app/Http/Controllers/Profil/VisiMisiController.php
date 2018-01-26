<?php

namespace App\Http\Controllers\Profil;

use App\Models\VisiMisi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VisiMisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'Visi & Misi';
        $page_description = '';
        $visiMisi = VisiMisi::find(1);

        return view('profil.visi-misi.index', compact('page_title', 'page_description', 'visiMisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Tambah';
        $page_description = 'Tambah baru Visi & Misi Kecamatan';

        return view('profil.visi-misi.create', compact('page_title', 'page_description'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            request()->validate([
                'kecamatan_id' => 'required|integer',
                'visi' => 'required',
                'misi' => 'required'
            ]);

            $id = VisiMisi::create($request->all())->id;


            return redirect()->route('profil.visi-misi.show', $id)->with('success', 'Visi & Misi berhasil disimpan!');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Visi & Misi gagal disimpan!!');
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
        $page_title = 'Visi & Misi';
        $page_description = '';
        $visiMisi = VisiMisi::findOrFail($id);

        return view('profil.visi-misi.index', compact('page_title', 'page_description', 'visiMisi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $visiMisi = VisiMisi::find($id);
        $page_title = 'Ubah Visi & Misi';
        $page_description = $visiMisi->kecamatan_id;

        return view('profil.visi-misi.edit', compact('page_title', 'page_description', 'visiMisi'));
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
            request()->validate([
                'kecamatan_id' => 'required|integer',
                'visi' => 'required',
                'misi' => 'required'
            ]);

            VisiMisi::find($id)->update($request->all());

            return redirect()->route('profil.visi-misi.show', $id)->with('success', 'Update Visi & Misi sukses!');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Update Visi & Misi gagal!');
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
            VisiMisi::findOrFail($id)->delete();

            return redirect()->route('profil.visi-misi.index')->with('success', 'Visi & Misi sukses dihapus!');

        } catch (Exception $e) {
            return redirect()->route('profil.visi-misi.index')->with('error', 'Visi & Misi gagal dihapus!');
        }
    }
}
