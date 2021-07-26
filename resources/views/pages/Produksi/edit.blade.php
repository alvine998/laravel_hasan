@extends('layout.produksi')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Edit Serah Terima {{ $item->tb_kustomers->nama_kustomer }}</h1>
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
                <form action="{{ route('update-produksi', $item->id) }}" method="post">
                  @method('PUT')
                  @csrf
                   <div class="form-group">
                        <label for="id_kustomer">Nama kustomer</label>
                        <select class="form-control select2" style="width: 100%;" name="id_kustomer" id="id_kustomer">
                        <option disabled value> Pilih nama kustomer</option>
                        <option value="{{ $item->id_kustomer }}">{{ $item->tb_kustomers->nama_kustomer }}</option>
                        @foreach ($tes as $te)
                        <option value="{{ $te->id_kustomer }}">{{ $te->nama_kustomer}}</option>
                        @endforeach
                        </select>
                      </div>  
                    <div class="form-group">
                        <label for="id_komponen">Nama komponen</label>
                        <select class="form-control select2" style="width: 100%;" name="id_komponen" id="id_komponen">
                        <option disabled value> Pilih nama komponen</option>
                        <option value="{{ $item->id_komponen}}">{{ $item->tb_kustomers->tb_komponens->nama_komponen}}</option>
                        @foreach ($mes as $me)
                        <option value="{{ $me->id_komponen}}">{{ $me->nama_komponen}}</option>
                        @endforeach
                        </select>
                      </div> 
                    <div class="form-group">
                        <label for="tanggal_produksi">Tanggal Produksi</label>
                        <input type="date" class="form-control" name="tanggal_produksi" placeholder="tanggal produksi" value="{{ $item->tanggal_produksi  }}">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_komponen">Jumlah Komponen</label>
                        <input type="text" class="form-control" name="jumlah_komponen" placeholder="Jumlah Komponen" value="{{ $item->jumlah_komponen }}">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">
                        Ubah
                    </button>
                    <a href="{{ route('serahterima-produksi') }}" class="btn btn-primary btn-sm" role="button" aria-pressed="true">kembali</a>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fas fa-times"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
                   
@endsection

