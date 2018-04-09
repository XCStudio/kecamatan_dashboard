<?php

namespace App\Http\Controllers\SistemKomplain;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SistemKomplainController extends Controller
{
    //
    public function index()
    {
        $data['page_title'] = 'SIKOMA';
        $data['page_description'] = 'Sistem Komplain Masyarakat';
        return view('sistem_komplain.index')->with($data);
    }
}
