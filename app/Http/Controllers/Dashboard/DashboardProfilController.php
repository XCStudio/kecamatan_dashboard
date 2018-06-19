<?php
namespace App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\DB;
use App\Models\Profil;
use App\Http\Controllers\Controller;
use Counter;
class DashboardProfilController extends Controller
{
    //
    /**
     * Menampilkan Data Profil Kecamatan
     **/

    public function showProfile()
    {
        Counter::count('dashboard.profil');

        $defaultProfil = env('KD_DEFAULT_PROFIL','1');

        $profil = Profil::where(['kecamatan_id'=>$defaultProfil])->first();

        $dokumen = DB::table('das_form_dokumen')->take(5)->get();

        $page_title = 'Profil Kecamatan';
        if(isset($profil)){
            $page_description= ucwords(strtolower($profil->kecamatan->nama));
        }

        return view('dashboard.profil.show_profil', compact('page_title', 'page_description', 'profil', 'defaultProfil', 'dokumen'));
    }
}
