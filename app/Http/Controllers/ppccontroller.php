<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ppcrequest;
use App\Models\tb_kustomer;
use App\Models\tb_perencanaan;
use App\Models\tb_komponen;
use Illuminate\Http\Request;
use illuminate\Support\str;


class ppccontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
         $items = tb_perencanaan::with(['tb_kustomers','tb_komponens'])->get();
        
        return view('pages.PPC.index',[  'items' => $items ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $mes = tb_kustomer::all();
        $tes = tb_komponen::all();
        return view ('pages.PPC.create',compact('mes','tes'));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ppcrequest $request)
    {
        tb_perencanaan::create([
            'id_kustomer' => $request->id_kustomer,
            'id_komponen'=>$request->id_komponen,
            'tanggal_produksi'=> $request->tanggal_produksi,
            'plan'=> $request->plan,
            'actual'=> $request->actual,
            'status'=>$request->status,
        ]);
        return redirect()->route('perencanaan-ppc')->with('toast_success', 'data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {  
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_perencanaan)
    { 
       $mes = tb_kustomer::all();
       $tes = tb_komponen::all();
       $item = tb_perencanaan::with('tb_kustomers','tb_komponens')->findorfail($id_perencanaan);

        return view('pages.PPC.edit', compact('item','mes','tes'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update (ppcrequest $request, $id_perencanaan)
    {
        
        $tb_perencanaans = tb_perencanaan::find($id_perencanaan);
        $tb_perencanaans->tanggal_produksi = $request->tanggal_produksi;
        $tb_perencanaans->plan = $request->plan;
        $tb_perencanaans->actual =  $request->actual;
        $tb_perencanaans->status = 0;
        $tb_perencanaans->save();

        $item = tb_perencanaan::findOrFail($id_perencanaan);

        return redirect()->route('perencanaan-ppc')->with('toast_success', 'data berhasil diubah');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_perencanaan)
    {
        $item = tb_perencanaan::findorFail($id_perencanaan);

        $item->delete();

        return redirect()->route('perencanaan-ppc')->with('toast_info', 'data berhasil dihapus');
    }
}
