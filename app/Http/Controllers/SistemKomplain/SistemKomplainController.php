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
      
        $komplains = Komplain::orderBy('created_at', 'desc')->paginate(10);
        return view('sistem_komplain.komplain.index', compact('page_title', 'page_description', 'komplains'));
    }

    public function indexKategori($slug)
    {
        $page_title = 'SIKOMA';
        $page_description = 'Sistem Komplain Masyarakat';

        $komplains = Komplain::where('kategori','=', $slug)->orderBy('created_at', 'desc')->paginate(10);
        return view('sistem_komplain.komplain.index', compact('page_title', 'page_description', 'komplains'));
    }

    public function indexSukses()
    {
        $page_title = 'SIKOMA';
        $page_description = 'Sistem Komplain Masyarakat';

        $komplains = Komplain::where('status','=', 'Belum')->orderBy('created_at', 'desc')->paginate(10);
        return view('sistem_komplain.komplain.index', compact('page_title', 'page_description', 'komplains'));
    }

    public function kirim()
    {
        $page_title = 'Kirim Komplain';
        $page_description = 'Kirim Komplain Baru';

        return view('sistem_komplain.komplain.kirim', compact('page_title', 'page_description'));
    }

    public function tracking(Request $request)
    {
        $komplain = Komplain::where('komplain_id', '=', $request->post('q'))->firstOrFail();
        return redirect()->route('sistem-komplain.komplain', $komplain->slug);
    }

    public function store(Request $request)
    {
        try{
            $komplain = new Komplain($request->all());
            $komplain->komplain_id = mt_rand(100000, 999999);
            $komplain->slug = str_slug($komplain->judul).'-'.$komplain->komplain_id;
            $komplain->status = 'BELUM';
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

            if ($request->hasFile('lampiran3')) {
                $lampiran3 = $request->file('lampiran3');
                $fileName3 = $lampiran3->getClientOriginalName();
                $path = "storage/komplain/".$komplain->komplain_id.'/';
                $request->file('lampiran3')->move($path, $fileName3);
                $komplain->lampiran3 = $path . $fileName3;
            }

            if ($request->hasFile('lampiran4')) {
                $lampiran4 = $request->file('lampiran4');
                $fileName4 = $lampiran4->getClientOriginalName();
                $path = "storage/komplain/".$komplain->komplain_id.'/';
                $request->file('lampiran3')->move($path, $fileName4);
                $komplain->lampiran4 = $path . $fileName4;
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
        return view('sistem_komplain.komplain.edit', compact('page_title', 'page_description', 'komplain'));
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
            $komplain->fill($request->all());

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

            if ($request->hasFile('lampiran3')) {
                $lampiran3 = $request->file('lampiran3');
                $fileName3 = $lampiran3->getClientOriginalName();
                $path = "storage/komplain/".$komplain->komplain_id.'/';
                $request->file('lampiran3')->move($path, $fileName3);
                $komplain->lampiran3 = $path . $fileName3;
            }

            if ($request->hasFile('lampiran4')) {
                $lampiran4 = $request->file('lampiran4');
                $fileName4 = $lampiran4->getClientOriginalName();
                $path = "storage/komplain/".$komplain->komplain_id.'/';
                $request->file('lampiran3')->move($path, $fileName4);
                $komplain->lampiran4 = $path . $fileName4;
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
  
    /**
     * Display the specified resource.
     *
     * @param  int  slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        try{
            $komplain = Komplain::where('slug', '=', $slug)->first();
        }catch(Exception $ex){
            return back()->withInput()->with('error', $ex);
        }
              
        $page_title = 'Detail Laporan';
        $page_description = $komplain->judul;
      
        return view('sistem_komplain.komplain.show', compact('page_title', 'page_description', 'komplain'));
    }
}
