@extends('layout.ppc')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Tambah Perencanaan </h1>
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
                <form action="{{ route('simpan-ppc') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="id_kustomer">Nama kustomer</label>
                        <select class="form-control select2" style="width: 100%;" name="id_kustomer" id="id_kustomer" value="{{ old('id_kustomer') }}">
                         <option value=""> --- Pilih Kustomer ---</option>
                        @foreach($mes as $me)
                        <option value="{{$me->id_kustomer}}">{{ $me->nama_kustomer }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_komponen">Nama komponen</label>
                        <select class="js-example-basic-single" style="width: 100%;" name="id_komponen" id="id_komponen"  value="{{ old('id_komponen') }}">
                        @foreach($tes as $te)
                        <option value="{{$te->id_komponen}}">{{ $te->nama_komponen }} </option>
                         @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_produksi">tanggal produksi</label>
                        <input type="date" class="form-control" name="tanggal_produksi" placeholder="tanggal porduksi" value="{{ old('tanggal_produksi') }}">
                    </div>
                    <div class="form-group">
                        <label for="plan">Plan</label>
                        <input type="text" class="form-control" name="plan" placeholder="plan" value="{{ old('plan') }}">
                    </div>
                    <div class="form-group">
                        <label for="actual">Actual</label>
                        <input type="text" class="form-control" name="actual" placeholder="actual" value="{{ old('actual') }}">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">
                        Simpan
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
