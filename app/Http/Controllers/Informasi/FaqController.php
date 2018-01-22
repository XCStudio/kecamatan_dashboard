<?php

namespace App\Http\Controllers\Informasi;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'FAQ';
        $page_description = 'Frequently Ask and Question';

        $faqs = Faq::latest()->paginate(2);
        return view('informasi.faq.index', compact('page_title', 'page_description', 'faqs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Tambah FAQ';
        $page_description = '';

        return view('informasi.faq.create', compact('page_title', 'page_description'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'question' => 'required',

            'answer' => 'required',

        ]);
        Faq::create($request->all());

        return redirect()->route('informasi.faq.index')->with('success', 'FAQ berhasil ditambah!');
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
        $faq = Faq::find($id);
        $page_title = 'Ubah FAQ';
        $page_description = $faq->question;

        return view('informasi.faq.edit', compact('page_title', 'page_description', 'faq'));
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
                'question' => 'required',
                'answer' => 'required',
            ]);

            Faq::find($id)->update($request->all());

            return redirect()->route('informasi.faq.index')->with('success', 'Update FAQ sukses!');
        } catch (Exception $e) {
            return back()->withInput()->with('success', 'FAQ berhasil ditambah!');
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
            Faq::findOrFail($id)->delete();

            return redirect()->route('informasi.faq.index')->with('success', 'FAQ sukses dihapus!');

        } catch (Exception $e) {
            return redirect()->route('informasi.faq.index')->with('error', 'FAQ gagal dihapus!');
        }
    }
}
