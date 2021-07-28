<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\mesinrequest;
use App\Models\tb_mesin;
use Illuminate\Http\Request;
use illuminate\Support\str;
use Illuminate\Database\QueryException;
class mesincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
         $items = tb_mesin::all();
        
        return view('pages.Mesin.index',[  'items' => $items ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('pages.Mesin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(mesinrequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->id_mesin);

        tb_mesin::create($data);
        return redirect()->route('mesin')->with('toast_success', 'data berhasil disimpan');
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
    public function edit($id_mesin)
    { 
       
       $item = tb_mesin::findorfail($id_mesin);

        return view('pages.Mesin.edit',[
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
    public function update (mesinrequest $request, $id_mesin)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->id_mesin);

        $item = tb_mesin::findOrFail($id_mesin);

        $item->update($data);

        return redirect()->route('mesin')->with('toast_success', 'data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_mesin)
    {
    try { 
        $item = tb_mesin::where("id_mesin",$id_mesin)->delete();
    } catch (QueryException $e) { 
        return redirect()->route('mesin')->with('toast_info', 'data tidak bisa dihapus');
    }
       

        return redirect()->route('mesin')->with('toast_info', 'data berhasil dihapus');
    }
}
