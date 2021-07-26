@extends('layout.opmanager')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Edit waktu standar {{ $item->tb_komponens->nama_komponen }}</h1>
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
                <form action="{{ route('update-waktu', $item->id) }}" method="post">
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
                        <option disabled value> Pilih nama komponen</option>
                        <option value="{{ $item->id_mesin}}">{{ $item->tb_komponens->tb_mesins->nama_mesin}}</option>
                        @foreach ($mes as $me)
                        <option value="{{ $me->id_mesin}}">{{ $me->nama_mesin}}</option>
                        @endforeach
                        </select>
                      </div> 
                    <div class="form-group">
                        <label for="waktu_standar">waktu standar</label>
                        <input type="text" class="form-control" name="waktu_standar" placeholder="waktu_standar" value="{{ $item->waktu_standar  }}">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_standar">jumlah standar</label>
                        <input type="text" class="form-control" name="jumlah_standar" placeholder="jumlah_standar" value="{{ $item->jumlah_standar }}">
                    </div>
                  
                    <button type="submit" class="btn btn-primary btn-sm">
                        Ubah
                    </button>
                    <a href="{{ route('waktu') }}" class="btn btn-primary btn-sm" role="button" aria-pressed="true">kembali</a>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fas fa-times"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
                   
@endsection

