@extends('layout.ppc')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Edit Perencanaan Prod {{ $item->tb_kustomers->nama_kustomer }}</h1>
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
                <form action="{{ route('update-ppc', $item->id_perencanaan) }}" method="post">
                  @method('PUT')
                  @csrf
                    <div class="form-group">
                        <label for="id_kustomer">Nama kustomer</label>
                        <input type="text" class="form-control" name="id_kustomer" readonly class="form-control-plaintext" value="{{ $item->tb_kustomers->nama_kustomer }}">                  
                          </div>  
                   <div class="form-group">
                        <label for="id_komponen">Nama komponen</label>
                        <input type="text" class="form-control" name="id_komponen" readonly class="form-control-plaintext" value="{{ $item->tb_komponens->nama_komponen }}">                  
                          </div>
                    <div class="form-group">
                        <label for="tanggal_produksi">Tanggal Produksi</label>
                        <input type="date" class="form-control" name="tanggal_produksi" placeholder="tanggal produksi" value="{{ $item->tanggal_produksi  }}">
                    </div>
                    <div class="form-group">
                        <label for="plan">Plan</label>
                        <input type="text" class="form-control" name="plan" placeholder="plan" value="{{ $item->plan }}">
                    </div>
                    <div class="form-group">
                        <label for="actual">Actual</label>
                        <input type="text" class="form-control" name="actual" placeholder="actual" value="{{ $item->actual }}">
                    </div>
                  
                    <button type="submit" class="btn btn-primary btn-sm">
                        Ubah
                    </button>
                    <a href="{{ route('perencanaan-ppc') }}" class="btn btn-primary btn-sm" role="button" aria-pressed="true">kembali</a>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fas fa-times"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
                   
@endsection

