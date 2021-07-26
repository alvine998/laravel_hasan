<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\penggunarequest;
use App\Models\tb_pengguna;
use Illuminate\Http\Request;
use illuminate\Support\str;
use Illuminate\Support\Facades\Hash;
class penggunacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
         $items = tb_pengguna::all();
       
        return view('pages.Admin.index',[  'items' => $items ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('pages.Admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(penggunarequest $request)
    {
        $tb_penggunas = new tb_pengguna;
        $tb_penggunas->id_pengguna = $request->id_pengguna;
        $tb_penggunas->nama_pengguna = $request->nama_pengguna;
        $tb_penggunas->alamat = $request->alamat;
        $tb_penggunas->username = $request->username;
        $tb_penggunas->password =  Hash::make($request->password);
        $tb_penggunas->roles = $request->roles;
        $tb_penggunas->save();
        
        
        return redirect()->route('pengguna')->with('toast_success', 'data berhasil disimpan');
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
    public function edit($id_pengguna)
    { 
       
       $item = tb_pengguna::findorfail($id_pengguna);

        return view('pages.Admin.edit',[
            'item' => $item
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update (penggunarequest $request, $id_pengguna)
    {
        $tb_penggunas = tb_pengguna::find($id_pengguna);
        $tb_penggunas->id_pengguna = $request->id_pengguna;
        $tb_penggunas->nama_pengguna = $request->nama_pengguna;
        $tb_penggunas->alamat = $request->alamat;
        $tb_penggunas->username = $request->username;
        $tb_penggunas->password =  Hash::make($request->password);
        $tb_penggunas->roles = $request->roles;
        $tb_penggunas->save();

        $item = tb_pengguna::findOrFail($id_pengguna);

        return redirect()->route('pengguna')->with('toast_success', 'data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pengguna)
    {
        $item = tb_pengguna::findorFail($id_pengguna);

        $item->delete();

        return redirect()->route('pengguna')->with('toast_info', 'data berhasil dihapus');
    }
}
