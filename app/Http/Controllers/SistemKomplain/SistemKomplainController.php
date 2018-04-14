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
        $data['page_title'] = 'SIKOMA';
        $data['page_description'] = 'Sistem Komplain Masyarakat';
      
        $data['komplains'] = Komplain::simplePaginate(10);
        return view('sistem_komplain.index')->with($data);
    }
}
