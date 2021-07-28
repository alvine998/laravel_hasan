<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\tb_laporan;

class dashboardproduksicontroller extends Controller
{
    public function index(Request $request)
    {
        return view ('pages.dashboardproduksi',[
            'tb_laporans_setuju' => tb_laporan::where('status','1')->count(),
            'tb_laporans_tolak' => tb_laporan::where('status','2')->count(),
        ]);
    }
}
