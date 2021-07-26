<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\wakturequest;
use App\Models\tb_komponen;
use App\Models\tb_waktu;
use App\Models\tb_mesin;
use Illuminate\Http\Request;
use illuminate\Support\str;
use DB;

class waktustandarcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
         $items = tb_waktu::with(['tb_komponens'])->get();
        
        return view('pages.Waktu.index',[  'items' => $items ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $mes = DB::table("tb_komponens")->select("id_komponen", "id_mesin", "nama_komponen")->get();
        return view ('pages.Waktu.create',compact('mes'));
       
    }

    ///get AJAX
    public function ubah1Ajax($id_mesin)
    {
        $mesins = DB::table("tb_mesins")
                    -> where("id_mesin",$id_mesin)
                    -> pluck("id_mesin","nama_mesin");
                    return json_encode($mesins);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(wakturequest $request)
    {
        $pecah = $data = explode("-" , $request->id_komponen);
        tb_waktu::create([
            'id_komponen' => $pecah[0],
            'id_mesin'=>$request->id_mesin,
            'waktu_standar'=> $request->waktu_standar,
            'jumlah_standar'=> $request->jumlah_standar,
        ]);
        return redirect()->route('waktu')->with('toast_success', 'data berhasil disimpan');
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
       $item = tb_waktu::with('tb_komponens','tb_mesins')->findorfail($id);

        return view('pages.Waktu.edit', compact('item','mes','tes'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update (wakturequest $request, $id)
    {
        
        $data = $request->all();
        $data['slug'] = Str::slug($request->id);

        $item = tb_waktu::findOrFail($id);

        $item->update($data);

        return redirect()->route('waktu')->with('toast_success', 'data berhasil diubah');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = tb_waktu::findorFail($id);

        $item->delete();

        return redirect()->route('waktu')->with('toast_info', 'data berhasil dihapus');
    }
}
