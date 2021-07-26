<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\komponenrequest;
use App\Models\tb_mesin;
use App\Models\tb_komponen;
use Illuminate\Http\Request;
use illuminate\Support\str;

class komponencontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
         $items = tb_komponen::with(['tb_mesins'])->get();

        return view('pages.Komponen.index',[  'items' => $items ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $mes = tb_mesin::all();
        return view('pages.Komponen.create',compact('mes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(komponenrequest $request)
    {

        tb_komponen::create([
            'id_komponen' => $request->id_komponen,
            'id_mesin'=>$request->id_mesin,
            'nama_komponen'=> $request->nama_komponen,
        ]);
        return redirect()->route('komponen')->with('toast_success', 'data berhasil disimpan');
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
    public function edit($id_komponen)
    { 
       $mes = tb_mesin::all();
       $item = tb_komponen::with('tb_mesins')->findorfail($id_komponen);

        return view('pages.Komponen.edit', compact('item','mes'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update (komponenrequest $request, $id_komponen)
    {
        
        $tb_komponens = tb_komponen::find($id_komponen);
        $tb_komponens->id_komponen= $request->id_komponen;
        $tb_komponens->nama_komponen= $request->nama_komponen;
        $tb_komponens->save();

        $item = tb_komponen::findOrFail($id_komponen);

        return redirect()->route('komponen')->with('toast_success', 'data berhasil diubah');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_komponen)
    {
        $item = tb_komponen::findorFail($id_komponen);

        $item->delete();

        return redirect()->route('komponen')->with('toast_info', 'data berhasil dihapus');
    }
}
