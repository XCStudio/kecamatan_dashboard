<?php

namespace App\Http\Controllers\Dashboard;

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
        Counter::showAndCount('dashboard.profil');
        $defaultProfil = env('KD_DEFAULT_PROFIL','1');

        $profil = Profil::where(['kecamatan_id'=>$defaultProfil])->first();

        $page_title = 'Profile Kecamatan';
        $page_description= 'Profil Kecamatan';


        return view('dashboard.profil.show_profil', compact('page_title', 'page_description', 'profil', 'defaultProfil'));
    }

    public function showProfilPartial($id)
    {
        $profil = Profil::where(['kecamatan_id'=>$id])->first();
        $page_title = 'Profile Kecamatan';
        $page_description= 'Profil Kecamatan';
        return view('dashboard.profil._profil_partial', compact('page_title', 'page_description', 'profil'));
    }


}
