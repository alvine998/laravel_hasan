<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\produksirequest;
use App\Models\tb_kustomer;
use App\Models\tb_serahterima;
use App\Models\tb_komponen;
use Illuminate\Http\Request;
use illuminate\Support\str;

class dataserahterimacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
         $items = tb_serahterima::with(['tb_kustomers'])->get();
        
        return view('pages.Dataserahterima.index',[  'items' => $items ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setuju($id)
    {
        
        $item = tb_serahterima::where('id',$id)->update(['status'=>1]); 
        return redirect('data-serahterima');
        

    }
    public function tolak($id)
    {

        $item = tb_serahterima::where('id', $id)->update(['status'=>2]);
        return redirect('data-serahterima');
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
        $item = tb_serahterima::with([
            'tb_kustomers', 'tb_komponens'
        ])->findOrFail($id);

        return view('pages.Dataserahterima.detail',[
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
