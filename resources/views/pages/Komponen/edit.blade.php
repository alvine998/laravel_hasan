@extends('layout.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Edit data komponen {{ $item->nama_komponen }}</h1>
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
                <form action="{{ route('update-komponen', $item->id_komponen) }}" method="post">
                  @method('PUT')
                  @csrf
                    <div class="form-group">
                        <label for="nama_komponen">Nama komponen</label>
                        <input type="text" class="form-control" name="nama_komponen" placeholder="nama_komponen" value="{{ $item->nama_komponen }}">
                    </div>
                    <div class="form-group">
                        <label for="id_mesin">Nama Mesin</label>
                        <input type="text" class="form-control" name="id_mesin" readonly class="form-control-plaintext" value="{{ $item->tb_mesins->nama_mesin }}">                  
                          </div>
                    <button type="submit" class="btn btn-primary btn-sm">
                        Ubah
                    </button>
                    <a href="{{ route('komponen') }}" class="btn btn-primary btn-sm" role="button" aria-pressed="true">kembali</a>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fas fa-times"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
                   
@endsection

