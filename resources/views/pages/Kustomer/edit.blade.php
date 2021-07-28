@extends('layout.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Edit data kustomer {{ $item->nama_kustomer }}</h1>
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
                <form action="{{ route('update-kustomer',  $item->id_kustomer) }}" method="post">
                  @method('PUT')
                  @csrf
                    <div class="form-group">
                        <label for="nama_kustomer">Nama kustomer</label>
                        <input type="text" class="form-control" name="nama_kustomer" placeholder="nama_kustomer" value="{{ $item->nama_kustomer }}">
                    </div>
                    <div class="form-group">
                        <label for="email_kustomer">email kustomer</label>
                        <input type="text" class="form-control" name="email_kustomer" placeholder="email_kustomer" value="{{ $item->email_kustomer }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat_kustomer">alamat kustomer</label>
                        <input type="text" class="form-control" name="alamat_kustomer" placeholder="alamat_kustomer" value="{{ $item->alamat_kustomer }}">
                    </div>
                     <div class="form-group">
                        <label for="no_telp">no telepon</label>
                        <input type="text" class="form-control" name="no_telp" placeholder="no_telp" value="{{ $item->no_telp }}">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">
                        Ubah
                    </button>
                    <a href="{{ route('kustomer') }}" class="btn btn-primary btn-sm" role="button" aria-pressed="true">kembali</a>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fas fa-times"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
                   
@endsection

