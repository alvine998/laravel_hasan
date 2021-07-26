<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\tb_perencanaan;
use App\Models\tb_waktu;

class dashboardppccontroller extends Controller
{
    public function index(Request $request)
    {
        return view ('pages.dashboardppc',[
            'tb_perencanaans' => tb_perencanaan::count(),
            'tb_perencanaans_setuju' => tb_perencanaan::where('status','1')->count(),
            'tb_perencanaans_tolak' => tb_perencanaan::where('status','2')->count(),
            'tb_waktus' => tb_waktu::count(),
        ]);

    }
}
