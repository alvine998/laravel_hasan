@extends('layout.produksi')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Edit laporan Harian Produksi {{ $item->tb_komponens->nama_komponen }}</h1>
     </div>

      <!-- Content Row -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('update-laporan', $item->id) }}" method="post">
                  @method('PUT')
                  @csrf
                   <div class="form-group">
                        <label for="id_komponen">Nama komponen</label>
                        <select class="form-control select2" style="width: 100%;" name="id_komponen" id="id_komponen">
                        <option disabled value> Pilih nama komponen</option>
                        <option value="{{ $item->id_komponen }}">{{ $item->tb_komponens->nama_komponen }}</option>
                        @foreach ($tes as $te)
                        <option value="{{ $te->id_komponen }}">{{ $te->nama_komponen}}</option>
                        @endforeach
                        </select>
                      </div>  
                    <div class="form-group">
                        <label for="id_mesin">Nama mesin</label>
                        <select class="form-control select2" style="width: 100%;" name="id_mesin" id="id_mesin">
                        <option disabled value> Pilih nama mesin</option>
                        <option value="{{ $item->id_mesin}}">{{ $item->tb_komponens->tb_mesins->nama_mesin}}</option>
                        @foreach ($mes as $me)
                        <option value="{{ $me->id_mesin}}">{{ $me->nama_mesin}}</option>
                        @endforeach
                        </select>
                      </div> 
                    <div class="form-group">
                        <label for="tanggal_produksi">Tanggal Produksi</label>
                        <input type="date" class="form-control" name="tanggal_produksi" placeholder="tanggal produksi" value="{{ $item->tanggal_produksi }}">
                    </div>
                    <div class="form-group">
                        <label for="qty_prod">Qty Produksi</label>
                        <input type="text" class="form-control" name="qty_prod" placeholder="qty_prod" value="{{  $item->qty_prod  }}">
                    </div>
                   <div class="form-group">
                        <label for="good">Good</label>
                        <input type="text" class="form-control" name="good" placeholder="good" value="{{ $item->good }}">
                    </div>
                    <div class="form-group">
                        <label for="not_good">Not Good</label>
                        <input type="text" class="form-control" name="not_good" placeholder="not_good" value="{{ $item->not_good }}">
                    </div>
                    <div class="form-group">
                        <label for="title">Masalah</label>
                        <select name="masalah" required class="form-control">
                            <option value="{{ $item->masalah }}">{{ $item->masalah }}</option>
                            <option value="TIDAK_ADA">TIDAK ADA</option>
                            <option value="MACHINE">MACHINE</option>
                            <option value="MATERIAL">MATERIAL</option>
                            <option value="MAN">MAN</option>
                            <option value="METHOD">METHOD</option>
                        </select>
                    </div>
                     <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" placeholder="keterangan" value="{{ $item->keterangan }}">
                    </div>
                  
                    <button type="submit" class="btn btn-primary btn-sm">
                        Ubah
                    </button>
                    <a href="{{ route('laporan-harian') }}" class="btn btn-primary btn-sm" role="button" aria-pressed="true">kembali</a>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fas fa-times"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
                   
@endsection

