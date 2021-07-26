<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\tb_pengguna;
use App\Models\tb_mesin;
use App\Models\tb_komponen;
use App\Models\tb_kustomer;
class dashboardcontroller extends Controller
{
    public function index(Request $request)
    {
        return view ('pages.dashboard',[

        'tb_penggunas' => tb_pengguna::count(),
        'tb_mesins' => tb_mesin::count(),
        'tb_komponens' => tb_komponen::count(),
        'tb_kustomers' => tb_kustomer::count(),

        ]);
        
    
}
}
