@extends('layout.produksi')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Tambah Serah Terima </h1>
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
                <form action="{{ route('simpan-produksi') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="id_kustomer">Nama kustomer</label>
                       <select  class="form-control select2" style="width: 100%;" name="id_kustomer" id="id_kustomer">
                        <option value=""> --- Pilih Kustomer ---</option>
                    @foreach($mes as $me)
                     <option value="{{$me->id_kustomer}}-{{$me->id_komponen}}">{{ $me->nama_kustomer }}</option>
                    @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_komponen">Nama komponen</label>
                        <select class="form-control select2" style="width: 100%;"  name="id_komponen" id="id_komponen" >
                         <option value=""> --- Pilih Komponen ---</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_produksi">tanggal produksi</label>
                        <input type="date" class="form-control" name="tanggal_produksi" placeholder="tanggal porduksi" value="{{ old('tanggal_produksi') }}">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_komponen">Jumlah Komponen</label>
                        <input type="text" class="form-control" name="jumlah_komponen" placeholder="Jumlah Komponen" value="{{ old('jumlah_komponen') }}">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">
                        Simpan
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

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="id_kustomer"]').on('change', function() {
            var id_kustomer_id_komponen = $(this).val();
            pecah = id_kustomer_id_komponen.split("-");
            id_komponen = pecah[1];
            if(id_komponen) {
                $.ajax({
                    url: '/create/createAjax/'+id_komponen,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="id_komponen"]').empty();
                        $.each(data, function(nama_komponen,id_komponen) {
                            $('select[name="id_komponen"]').append('<option value="'+ id_komponen +' ">'+ nama_komponen +'</option>');
                            console.log(data);
                        });


                    }
                });
            }else{
                $('select[name="id_komponen"]').empty();
                
            }
        });
    });
</script>

@endsection



