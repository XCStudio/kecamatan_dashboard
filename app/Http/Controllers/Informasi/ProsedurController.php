<?php

namespace App\Http\Controllers\Informasi;

use App\Models\Prosedur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProsedurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $page_title= 'Kumpulan Prosedur';
        $prosedurs = Prosedur::latest()->paginate(10);

        return view('informasi.prosedur.index',compact(['page_title', 'prosedurs']))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Tambah Prosedur';
        return view('informasi.prosedur.create', compact('page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'judul_prosedur' => 'required',

            'file_prosedur' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $prosedur = new Prosedur($request->input()) ;

        if($file = $request->hasFile('file_prosedur')) {

            $file = $request->file('file_prosedur') ;

            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/data/informasi/prosedur/' ;
            $file->move($destinationPath,$fileName);
            $prosedur->file_prosedur = $fileName ;
        }
        $prosedur->save() ;

        return redirect()->route('informasi.prosedur.index')->with('success','Prosedur berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prosedur = Prosedur::find($id);
        $page_title = 'Detail Prosedur :'.$prosedur->judul_prosedur;

        return view('informasi.prosedur.show',compact('page_title','prosedur'));
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
        Prosedur::find($id)->delete();
        return redirect()->route('informasi.prosedur.index')->with('success','Prosedur Berhasil dihapus!');
    }
}
