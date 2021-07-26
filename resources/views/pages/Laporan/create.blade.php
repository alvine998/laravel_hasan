@extends('layout.produksi')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Tambah Laporan Harian Produksi</h1>
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
                <form action="{{ route('simpan-laporan') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="id_komponen">Nama komponen</label>
                        <select class="form-control select2" style="width: 100%;" name="id_komponen" id="id_komponen">  
                       <option value=""> --- Pilih Komponen ---</option>
                        @foreach($mes as $me)
                        <option value="{{$me->id_komponen}}-{{$me->id_mesin}}">{{ $me->nama_komponen }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_mesin">Nama mesin</label>
                        <select class="form-control select2" style="width: 100%;" name="id_mesin" id="id_mesin">
                         <option value=""> --- Pilih Mesin ---</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_produksi">Tanggal Produksi</label>
                        <input type="date" class="form-control" name="tanggal_produksi" placeholder="tanggal produksi" value="{{ old('tanggal_produksi') }}">
                    </div>
                    <div class="form-group">
                        <label for="qty_prod">Qty Produksi</label>
                        <input type="text" class="form-control" name="qty_prod" placeholder="qty_prod" value="{{ old('qty_prod') }}">
                    </div>
                   <div class="form-group">
                        <label for="good">Good</label>
                        <input type="text" class="form-control" name="good" placeholder="good" value="{{ old('good') }}">
                    </div>
                    <div class="form-group">
                        <label for="not_good">Not Good</label>
                        <input type="text" class="form-control" name="not_good" placeholder="not_good" value="{{ old('not_good') }}">
                    </div>
                    <div class="form-group">
                        <label for="title">Masalah</label>
                        <select name="masalah" required class="form-control select2">
                            <option value=""> --- Pilih Masalah ---</option>
                            <option value="TIDAK_ADA">TIDAK ADA</option>
                            <option value="MACHINE">MACHINE</option>
                            <option value="MATERIAL">MATERIAL</option>
                            <option value="MAN">MAN</option>
                            <option value="METHOD">METHOD</option>
                        </select>
                    </div>
                     <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" placeholder="keterangan" value="{{ old('keterangan') }}">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">
                        Simpan
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

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="id_komponen"]').on('change', function() {
            var id_komponen_id_mesin = $(this).val();
            pecah = id_komponen_id_mesin.split("-");
            id_mesin = pecah[1];
            if(id_mesin) {
                $.ajax({
                    url: '/ubah/ubahAjax/'+id_mesin,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="id_mesin"]').empty();
                        $.each(data, function(nama_mesin,id_mesin) {
                            $('select[name="id_mesin"]').append('<option value="'+ id_mesin +' ">'+ nama_mesin +'</option>');
                            console.log(data);
                        });


                    }
                });
            }else{
                $('select[name="id_mesin"]').empty();
                
            }
        });
    });
</script>                   


@endsection

