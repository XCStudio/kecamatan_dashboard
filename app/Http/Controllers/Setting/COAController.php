<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class COAController extends Controller
{
    //
    public function index(){
        $page_title = 'Daftar Akun';
        $page_description = 'Daftar Akun COA';

        return view('setting.coa.index', compact('page_title', 'page_description'));
    }



}
