<?php

namespace App\Http\Controllers\Counter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Counter;

class CounterController extends Controller
{
    //
    public function index()
    {
        $page_title = 'Statistik Pengunjung';
        $page_description = 'Jumlah Statistik Pengunjung Website';
        return view('counter.index', compact('page_title', 'page_description'));
    }
}
