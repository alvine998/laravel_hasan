<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\kustomerrequest;
use App\Models\tb_kustomer;
use App\Models\tb_komponen;
use Illuminate\Http\Request;
use illuminate\Support\str;

class kustomercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
         $items = tb_kustomer::with(['tb_komponens'])->get();
    
        return view('pages.Kustomer.index',[  'items' => $items ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $mes = tb_komponen::all();
        return view('pages.Kustomer.create',compact('mes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(kustomerrequest $request)
    {

        tb_kustomer::create([
            'id_kustomer' => $request->id_kustomer,
            'id_komponen'=>$request->id_komponen,
            'nama_kustomer'=> $request->nama_kustomer,
            'email_kustomer'=> $request->email_kustomer,
            'alamat_kustomer'=> $request->alamat_kustomer,
            'no_telp'=> $request->no_telp,
        ]);
        return redirect()->route('kustomer')->with('toast_success', 'data berhasil disimpan');
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
    public function edit($id_kustomer)
    { 
       $mes = tb_komponen::all();
       $item = tb_kustomer::with('tb_komponens')->findorfail($id_kustomer);
        return view('pages.Kustomer.edit', compact('item','mes'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update (kustomerrequest $request, $id_kustomer)
    {
        
        $tb_kustomers = tb_kustomer::find($id_kustomer);
        $tb_kustomers->id_kustomer= $request->id_kustomer;
        $tb_kustomers->nama_kustomer= $request->nama_kustomer;
        $tb_kustomers->email_kustomer= $request->email_kustomer;
        $tb_kustomers->alamat_kustomer= $request->alamat_kustomer;
        $tb_kustomers->no_telp= $request->no_telp;
        $tb_kustomers->save();

        $item = tb_kustomer::findOrFail($id_kustomer    );


        return redirect()->route('kustomer')->with('toast_success', 'data berhasil diubah');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kustomer)
    {
        $item = tb_kustomer::findorFail($id_kustomer);

        $item->delete();

        return redirect()->route('kustomer')->with('toast_info', 'data berhasil dihapus');
    }
}
