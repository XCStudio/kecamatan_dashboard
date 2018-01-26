<?php

namespace App\Http\Controllers\INformasi;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'Event';
        $page_description = 'Kumpulan even-even terdekat';
        $events = Event::getOpenEvents();

        return view('informasi.event.index', compact('page_title', 'page_description', 'events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Tambah';
        $page_description = 'Tambah event baru';

        return view('informasi.event.create', compact('page_title', 'page_description'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $event = new Event($request->input());
            request()->validate([
                'event_name' => 'required',
                'start' => 'required',
                'end' => 'required',
                'attendants' => 'required'
            ]);
            $event->status = 'OPEN';
            $event->save();
            return redirect()->route('informasi.event.index')->with('success', 'Event berhasil disimpan!');
        }catch (Exception $e){
            return back()->withInput()->with('error', 'Simpan Event gagal!');
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
        $page_title = 'Ubah';
        $page_description = 'Edit Event';
        $event = Event::find($id);

        return view('informasi.event.edit', compact('page_title', 'page_description', 'event'));
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
        try {
            request()->validate([
                'event_name' => 'required',
                'start' => 'required',
                'end' => 'required',
                'attendants' => 'required'
            ]);

            Event::find($id)->update($request->all());

            return redirect()->route('informasi.event.index')->with('success', 'Update Event sukses!');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Update Event gagal!');
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
        try {
            Event::findOrFail($id)->delete();

            return redirect()->route('informasi.event.index')->with('success', 'Event sukses dihapus!');

        } catch (Exception $e) {
            return redirect()->route('informasi.event.index')->with('error', 'Event gagal dihapus!');
        }
    }
}
