<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\laporanrequest;
use App\Models\tb_komponen;
use App\Models\tb_laporan;
use App\Models\tb_mesin;
use Illuminate\Http\Request;
use illuminate\Support\str;

class datalaporancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
         $items = tb_laporan::with(['tb_komponens'])->get();
        
        return view('pages.Datalaporan.index',[  'items' => $items ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function setuju($id)
    {
        
        $item = tb_laporan::where('id',$id)->update(['status'=>1]); 
        return redirect('data-laporan');
        

    }
    public function tolak($id)
    {

        $item = tb_laporan::where('id', $id)->update(['status'=>2]);
        return redirect('data-laporan');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = tb_laporan::with([
            'tb_komponens','tb_mesins'
           ])->findOrFail($id);
   
           return view('pages.Datalaporan.detail',[
               'item' => $item
           ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
}
