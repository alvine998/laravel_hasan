@extends('layout.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Tambah data pengguna</h1>
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
                <form action="{{ route('simpan-pengguna') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nama_pengguna">Nama pengguna</label>
                        <input type="text" class="form-control" name="nama_pengguna" placeholder="nama_pengguna" value="{{ old('nama_pengguna') }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="alamat" value="{{ old('alamat') }}">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="username" value="{{ old('username') }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" name="password" placeholder="password" value="{{ old('password') }}">
                    </div>
                    <div class="form-group">
                        <label for="roles">Roles</label>
                        <input type="roles" class="form-control" name="roles" placeholder="roles" value="{{ old('roles') }}">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">
                        Simpan
                    </button>
                     <a href="{{ route('pengguna') }}" class="btn btn-primary btn-sm" role="button" aria-pressed="true">kembali</a>
                     <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fas fa-times"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
                   
@endsection

