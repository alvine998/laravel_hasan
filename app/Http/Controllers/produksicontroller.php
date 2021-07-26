<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\produksirequest;
use App\Models\tb_kustomer;
use App\Models\tb_serahterima;
use App\Models\tb_komponen;
use Illuminate\Http\Request;
use illuminate\Support\str;
use DB;

class produksicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
         $items = tb_serahterima::with(['tb_kustomers'])->get();
        return view('pages.Produksi.index',[  'items' => $items ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $mes = DB::table("tb_kustomers")->select("id_kustomer", "id_komponen", "nama_kustomer")->get();
        return view ('pages.Produksi.create',compact('mes'));
       
    }

    ///get AJAX
    public function createAjax($id_komponen)
    {
        $komponens = DB::table("tb_komponens")
                    -> where("id_komponen",$id_komponen)
                    -> pluck("id_komponen","nama_komponen");
                    return json_encode($komponens);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(produksirequest $request)
    {

        $pecah = $data = explode("-" , $request->id_kustomer);
        tb_serahterima::create([
            'id_kustomer' => $pecah[0],
            'id_komponen'=>$request->id_komponen,
            'tanggal_produksi'=> $request->tanggal_produksi,
            'jumlah_komponen'=> $request->jumlah_komponen,
            'status'=>$request->status,
        ]);
      
        return redirect()->route('serahterima-produksi')->with('toast_success', 'data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
       $tes =tb_kustomer::all();
       $mes =tb_komponen::all();
       $item = tb_serahterima::with('tb_kustomers','tb_komponens')->findorfail($id);

        return view('pages.Produksi.edit', compact('item','mes','tes'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update (produksirequest $request, $id)
    {
        
        $tb_serahterimas = tb_serahterima::find($id);
        $tb_serahterimas->id_kustomer = $request->id_kustomer;
        $tb_serahterimas->id_komponen = $request->id_komponen;
        $tb_serahterimas->tanggal_produksi = $request->tanggal_produksi;
        $tb_serahterimas->jumlah_komponen = $request->jumlah_komponen;
        $tb_serahterimas->status = 0;
        $tb_serahterimas->save();

        $item = tb_serahterima::findOrFail($id);

        return redirect()->route('serahterima-produksi')->with('toast_success', 'data berhasil diubah');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = tb_serahterima::findorFail($id);

        $item->delete();

        return redirect()->route('serahterima-produksi')->with('toast_info', 'data berhasil dihapus');
    }
}
