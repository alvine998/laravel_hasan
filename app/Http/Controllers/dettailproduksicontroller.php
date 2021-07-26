<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\produksirequest;
use App\Models\tb_kustomer;
use App\Models\tb_serahterima;
use App\Models\tb_komponen;
use Illuminate\Http\Request;
use illuminate\Support\str;
use Illuminate\Support\Facades\DB;

class dettailproduksicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
         $items = tb_serahterima::with(['tb_kustomers'])->get();
        return view('pages.PPC.detail',[  'items' => $items ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
}
