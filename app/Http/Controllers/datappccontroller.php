<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ppcrequest;
use App\Models\tb_kustomer;
use App\Models\tb_perencanaan;
use App\Models\tb_komponen;
use Illuminate\Http\Request;
use illuminate\Support\str;

class datappccontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
         $items = tb_perencanaan::with(['tb_kustomers'])->get();
        return view('pages.DataPPC.index',[  'items' => $items ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setuju($id_perencanaan)
    {
        
        $item = tb_perencanaan::where('id_perencanaan',$id_perencanaan)->update(['status'=>1]); 
        return redirect('data-perencanaan');
        

    }
    public function tolak($id_perencanaan)
    {

        $item = tb_perencanaan::where('id_perencanaan', $id_perencanaan)->update(['status'=>2]);
        return redirect('data-perencanaan');
        

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
    public function show($id_perencanaan)
    {
        $item = tb_perencanaan::with([
            'tb_kustomers', 'tb_komponens', 
        ])->findOrFail($id_perencanaan);

        return view('pages.DataPPC.detail',[
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
