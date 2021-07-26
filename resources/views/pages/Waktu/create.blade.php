@extends('layout.opmanager')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Tambah waktu standar</h1>
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
                <form action="{{ route('simpan-waktu') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="id_komponen">Nama komponen</label>
                        <select class="form-control select2" style="width: 100%;" name="id_komponen" id="id_komponen" value="{{ old('id_komponen') }}">
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
                        <label for="waktu_standar">waktu standar</label>
                        <input type="text" class="form-control" name="waktu_standar" placeholder="waktu_standar" value="{{ old('waktu_standar') }}">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_standar">Jumlah standar</label>
                        <input type="text" class="form-control" name="jumlah_standar" placeholder="jumlah_standar" value="{{ old('jumlah_standar') }}">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">
                        Simpan
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

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="id_komponen"]').on('change', function() {
            var id_komponen_id_mesin = $(this).val();
            pecah = id_komponen_id_mesin.split("-");
            id_mesin = pecah[1];
            if(id_mesin) {
                $.ajax({
                    url: '/ubah1/ubah1Ajax/'+id_mesin,
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