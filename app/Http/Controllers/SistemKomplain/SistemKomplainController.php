<?php

namespace App\Http\Controllers\SistemKomplain;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Komplain;

class SistemKomplainController extends Controller
{
    //
    public function index()
    {
        $page_title = 'SIKOMA';
        $page_description = 'Sistem Komplain Masyarakat';
      
        $komplains = Komplain::simplePaginate(10);
        return view('sistem_komplain.index', compact('page_title', 'page_description', 'komplains'));
    }

    public function kirim()
    {
        $page_title = 'Kirim Komplain';
        $page_description = 'Kirim Komplain Baru';

        return view('sistem_komplain.kirim', compact('page_title', 'page_description'));
    }

    public function store(Request $request)
    {
        try{
            $komplain = new Komplain($request->all());
            $komplain->komplain_id = mt_rand(100000, 999999);
            $komplain->slug = str_slug($komplain->judul);
            $komplain->status = 'Belum';
            $komplain->dilihat = 0;
            $komplain->nama = $komplain->nik;

            request()->validate([
                'nik' => 'required|numeric',
                'judul' => 'required',
                'kategori' => 'required',
                'laporan' => 'required|min:30',
                'captcha' => 'required|captcha'
            ],['captcha.captcha'=>'Invalid captcha code.']);

            // Save if lampiran available
            if ($request->hasFile('lampiran1')) {
                $lampiran1 = $request->file('lampiran1');
                $fileName1 = $lampiran1->getClientOriginalName();
                $path = "storage/komplain/".$komplain->komplain_id.'/';
                $request->file('lampiran1')->move($path, $fileName1);
                $komplain->lampiran1 = $path . $fileName1;
            }

            if ($request->hasFile('lampiran2')) {
                $lampiran2 = $request->file('lampiran2');
                $fileName2 = $lampiran2->getClientOriginalName();
                $path = "storage/komplain/".$komplain->komplain_id.'/';
                $request->file('lampiran2')->move($path, $fileName2);
                $komplain->lampiran2 = $path . $fileName2;
            }

            $komplain->save();
            return redirect()->route('sistem-komplain.index')->with('success', 'Komplain berhasil dikirim!');

        }catch (Eception $e){
            return back()->withInput()->with('error', 'Komplain gagal dikirim!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $komplain = Komplain::where('komplain_id', '=', $id)->first();
        $page_title = 'Edit Komplain';
        $page_description = 'Komplain '.$komplain->komplain_id;
        return view('sistem_komplain.edit', compact('page_title', 'page_description', 'komplain'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Save Request
        try{
            $komplain = Komplain::findOrFail($id);

            request()->validate([
                'nik' => 'required|numeric',
                'judul' => 'required',
                'kategori' => 'required',
                'laporan' => 'required|min:30',
            ],['captcha.captcha'=>'Invalid captcha code.']);

            // Save if lampiran available
            if ($request->hasFile('lampiran1')) {
                $lampiran1 = $request->file('lampiran1');
                $fileName1 = $lampiran1->getClientOriginalName();
                $path = "storage/komplain/".$komplain->komplain_id.'/';
                $request->file('lampiran1')->move($path, $fileName1);
                $komplain->lampiran1 = $path . $fileName1;
            }

            if ($request->hasFile('lampiran2')) {
                $lampiran2 = $request->file('lampiran2');
                $fileName2 = $lampiran2->getClientOriginalName();
                $path = "storage/komplain/".$komplain->komplain_id.'/';
                $request->file('lampiran2')->move($path, $fileName2);
                $komplain->lampiran2 = $path . $fileName2;
            }

            $komplain->save();
            return redirect()->route('sistem-komplain.index')->with('success', 'Komplain berhasil dikirim!');

        }catch (Eception $e){
            return back()->withInput()->with('error', 'Komplain gagal dikirim!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Komplain::findOrFail($id)->delete();

            return redirect()->route('sistem-komplain.index')->with('success', 'Komplain sukses dihapus!');

        } catch (Exception $e) {
            return redirect()->route('sistem-komplain.index')->with('error', 'Komplain gagal dihapus!');
        }
    }
}
