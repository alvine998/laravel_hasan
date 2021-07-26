@extends('layout.opmanager')
@section('content')

<!-- Begin Page Content -->
    <div class="container-fluid">
<div class="d-sm-flex mb-0">
      <div class="form-group">
                        <label for="label">Tanggal Awal</label>
                        <input type="date" class="form-control" name="tglawal" id="tglawal" placeholder="tanggal awal">
                    </div>
          <div class="form-group px-md-2">
                        <label for="label">Tanggal Akhir</label>
                        <input type="date" class="form-control" name="tglakhir" id="tglakhir" placeholder="tanggal akhir">
                    </div>        
                    </div>     
      <div>
      <a href="#" onclick="#" target="#" class=" d-done d-sm-inline-block btn btn-sm btn-primary shadow-sm">
       Pilih</a>                          
      </div>                           
  

         
@endsection