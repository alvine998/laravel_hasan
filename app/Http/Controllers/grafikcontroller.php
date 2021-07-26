<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\laporanrequest;
use App\Models\tb_laporan;
use Illuminate\Http\Request;
use illuminate\Support\str;
use DB;
use Carbon\Carbon;

class grafikcontroller extends Controller
{
    public function index()
    {
      $users = tb_laporan::select(\DB::raw("COUNT(*) as count"))
                    ->where('masalah', ['MAN','METHOD', 'MATERIAL', 'MACHINE'])
                    ->groupBy(\DB::raw("masalah"))
                    ->pluck('count');
    return view('pages.Grafik.grafik',compact('users'));
    }

    public function grafik($tglawal, $tglakhir)
    {
       // dd(["Tanggal Awal : ".$tglawal,"Tanggal Akhir : ".$tglakhir]);
       $peg = tb_laporan::with('tb_komponens')->whereBetween('tanggal_produksi',[$tglawal,$tglakhir])->latest()->get();  
        return view ('pages.Grafik.Grafik', compact('peg'));
    }
  
} 
