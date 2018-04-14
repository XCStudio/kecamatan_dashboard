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
        request()->validate([
            'nik' => 'required|max:5|min:5',
            'judul' => 'required',
            'laporan' => 'required|min:50',
            'captcha' => 'required|captcha'
        ],
            ['captcha.captcha'=>'Invalid captcha code.']);
        dd("You are here :) .". mt_rand(100000, 999999));
    }
}
