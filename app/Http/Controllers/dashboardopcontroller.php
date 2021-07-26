<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\tb_waktu;
use App\Models\tb_perencanaan;
use App\Models\tb_serahterima;
use App\Models\tb_laporan;
class dashboardopcontroller extends Controller
{
    public function index(Request $request)
    {
        return view ('pages.dashboardop',[
            'tb_waktus' => tb_waktu::count(),
            'tb_perencanaans_setuju' => tb_perencanaan::where('status','1')->count(),
            'tb_serahterimas_setuju' => tb_serahterima::where('status','1')->count(),
            'tb_laporans_setuju'=> tb_laporan::where('status','1')->count(),
        ]);
    
}
}