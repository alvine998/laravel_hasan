<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\laporanrequest;
use App\Models\tb_komponen;
use App\Models\tb_laporan;
use App\Models\tb_mesin;
use Illuminate\Http\Request;
use illuminate\Support\str;
use DB;

class laporancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
         $items = tb_laporan::with(['tb_komponens'])->get();
        
        return view('pages.Laporan.index',[  'items' => $items ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $mes = DB::table("tb_komponens")->select("id_komponen", "id_mesin", "nama_komponen")->get();
        return view ('pages.Laporan.create',compact('mes'));
       
    }

    ///get AJAX
    public function ubahAjax($id_mesin)
    {
        $mesins = DB::table("tb_mesins")
                    -> where("id_mesin",$id_mesin)
                    -> pluck("id_mesin","nama_mesin");
                    return json_encode($mesins);
    }
  
    public function cetak($tglawal, $tglakhir)
    {
       // dd(["Tanggal Awal : ".$tglawal,"Tanggal Akhir : ".$tglakhir]);
       $peg = tb_laporan::with('tb_komponens')->whereBetween('tanggal_produksi',[$tglawal,$tglakhir])->latest()->get();  
        return view ('pages.Laporan.cetak', compact('peg'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(laporanrequest $request)
    {
        $pecah = $data = explode("-" , $request->id_komponen);
        tb_laporan::create([
            'id_komponen' => $pecah[0],
            'id_mesin'=>$request->id_mesin,
            'tanggal_produksi'=> $request->tanggal_produksi,
            'qty_prod'=> $request->qty_prod,
            'good'=> $request->good,
            'not_good'=> $request->not_good,
            'masalah'=> $request->masalah,
            'keterangan'=> $request->keterangan,
            'status'=> $request->status,

        ]);
        return redirect()->route('laporan-harian')->with('toast_success', 'data berhasil disimpan');
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
       $tes =tb_komponen::all();
       $mes =tb_mesin::all();
       $item = tb_laporan::with('tb_komponens','tb_mesins')->findorfail($id);

        return view('pages.Laporan.edit', compact('item','mes','tes'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update (laporanrequest $request, $id)
    {
        
        $tb_laporans = tb_laporan::find($id);
        $tb_laporans->id_komponen = $request->id_komponen;
        $tb_laporans->id_mesin = $request->id_mesin;
        $tb_laporans->tanggal_produksi = $request->tanggal_produksi;
        $tb_laporans->qty_prod = $request->qty_prod;
        $tb_laporans->good = $request->good;
        $tb_laporans->not_good = $request->not_good;
        $tb_laporans->masalah = $request->masalah;
        $tb_laporans->keterangan = $request->keterangan;
        $tb_laporans->status = 0;
        $tb_laporans->save();

        $item = tb_laporan::findOrFail($id);


        return redirect()->route('laporan-harian')->with('toast_success', 'data berhasil diubah');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = tb_laporan::findorFail($id);

        $item->delete();

        return redirect()->route('laporan-harian')->with('toast_info', 'data berhasil dihapus');
    }
}
