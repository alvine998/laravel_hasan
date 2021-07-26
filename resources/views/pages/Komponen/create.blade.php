@extends('layout.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Tambah data Komponen</h1>
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
                <form action="{{ route('simpan-komponen') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nama_komponen">Nama komponen</label>
                        <input type="text" class="form-control" name="nama_komponen" placeholder="nama_komponen" value="{{ old('nama_komponen') }}">
                    </div>
                    <div class="form-group">
                        <label for="id_mesin">Nama mesin</label>
                        <select class="form-control select2" style="width: 100%;" name="id_mesin" id="id_mesin" value="{{ old('id_mesin') }}">
                        <option value=""> --- Pilih Mesin ---</option>
                        @foreach ($mes as $item)
                        <option value="{{ $item->id_mesin }}">{{$item->nama_mesin}}</option>
                        @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">
                        Simpan
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

