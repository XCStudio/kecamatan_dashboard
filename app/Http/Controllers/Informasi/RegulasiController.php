<?php

namespace App\Http\Controllers\Informasi;

use App\Models\Profil;
use App\Models\Regulasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Counter;

class RegulasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Counter::count('informasi.regulasi.index');

        $page_title = 'Regulasi Kecamatan';
        $page_description = 'Kumpulan regulasi';
        $regulasi = Regulasi::orderBy('id', 'asc')->paginate(10);

        $defaultProfil = env('KD_DEFAULT_PROFIL','1');

        $profil = Profil::where(['kecamatan_id'=>$defaultProfil])->first();

        return view('informasi.regulasi.index', compact('page_title', 'page_description', 'regulasi', 'defaultProfil', 'profil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Tambah';
        $page_description = 'Tambah baru Regulasi Kecamatan';

        return view('informasi.regulasi.create', compact('page_title', 'page_description'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         try {

             request()->validate([
                 //'kecamatan_id' => 'required|integer',
                 'tipe_regulasi' => 'required',
                 'judul' => 'required',
                 'deskripsi' => 'required',
                 'file_regulasi' => 'required'
             ]);

             $regulasi = new Regulasi($request->all());
             $regulasi->kecamatan_id = env('KD_DEFAULT_PROFIL', null);


             if ($request->hasFile('file_regulasi')) {
                 $lampiran1 = $request->file('file_regulasi');
                 $fileName1 = $lampiran1->getClientOriginalName();
                 $path = "storage/regulasi/";
                 $request->file('file_regulasi')->move($path, $fileName1);
                 $regulasi->file_regulasi = $path . $fileName1;
             }


             $regulasi->save();

            return redirect()->route('informasi.regulasi.index')->with('success', 'Regulasi berhasil disimpan!');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Regulasi gagal disimpan!!');
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
        $regulasi = Regulasi::findOrFail($id);
        $page_title = "Detail Regulasi";
        $page_description = "Detail Regulasi: ".$page_title;

        return view('informasi.regulasi.show', compact('page_title', 'page_description', 'regulasi'));
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
        $regulasi = Regulasi::findOrFail($id);
        $page_title = 'Edit Regulasi';
        $page_description = 'Edit Regulasi: '.$regulasi->judul;

        return view('informasi.regulasi.edit', compact('page_title', 'page_description', 'regulasi'));
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
        try {
            $regulasi = Regulasi::findOrFail($id);
            $regulasi->fill($request->all());


            if ($request->hasFile('file_regulasi')) {
                $lampiran1 = $request->file('file_regulasi');
                $fileName1 = $lampiran1->getClientOriginalName();
                $path = "storage/regulasi/";
                $request->file('file_regulasi')->move($path, $fileName1);
                $regulasi->file_regulasi = $path . $fileName1;
            }

            request()->validate([
                //'kecamatan_id' => 'required|integer',
                'tipe_regulasi' => 'required',
                'judul' => 'required',
                'deskripsi' => 'required',
            ]);

            $regulasi->save();

            return redirect()->route('informasi.regulasi.show', $id)->with('success', 'Regulasi berhasil disimpan!');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Regulasi gagal disimpan!!');
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
            Regulasi::findOrFail($id)->delete();

            return redirect()->route('informasi.regulasi.index')->with('success', 'Regulasi sukses dihapus!');

        } catch (Exception $e) {
            return redirect()->route('informasi.regulasi.index')->with('error', 'Regulasi gagal dihapus!');
        }
    }
}
