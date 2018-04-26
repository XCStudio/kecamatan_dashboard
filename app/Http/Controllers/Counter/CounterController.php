<?php

namespace App\Http\Controllers\Counter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Counter;
use Illuminate\Support\Facades\DB;
use Kryptonit3\Counter\Models\Page;

class CounterController extends Controller
{
    //
    public function index()
    {
        $page_title = 'Statistik Pengunjung';
        $page_description = 'Jumlah Statistik Pengunjung Website';
        $top_pages = $this->geTopPage();
        return view('counter.index', compact('page_title', 'page_description', 'top_pages'));
    }

    protected function geTopPage()
    {
        $data = null;
        $sql = DB::table('kryptonit3_counter_page_visitor')
            ->selectRaw('page_id, COUNT(*) AS total')
            ->groupBy('page_id')
            ->orderBy('total', 'desc')
            ->get();

        foreach($sql as $item)
        {
            $page = Page::find($item->page_id);
            //$uri = explode($page->page, '|');
            $data[] = [
                'id' => $item->page_id,
                'url' => route($page->page),
                'total' => $item->total,
            ];
        }
        return $data;
    }
}
