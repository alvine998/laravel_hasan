@extends('layout.opmanager')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Waktu standar</h1>
         <a href="{{ route('tambah-waktu') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
         <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Waktu Standar
          </a>
     </div>
<!-- Content Row -->
      <div class="row">
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="opmanagertable1" width="100%" cellspacing="0">
                      <thead>
                      <tr>
                          <th>nama komponen</th>
                          <th>nama mesin</th>
                          <th>waktu Standar</th>
                          <th>jumlah Standar</th>
                          <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      @forelse($items as $item)
                          <tr>
                              <td>{{ $item->tb_komponens->nama_komponen }}</td>
                              <td>{{ $item->tb_komponens->tb_mesins->nama_mesin }}</td>
                              <td>{{ $item->waktu_standar }}</td>
                              <td>{{ $item->jumlah_standar }}</td>
                              <td>
                                  <a href="{{ route('edit-waktu', $item->id) }}" class="btn btn-info ">
                                      <i class="fa fa-pencil-alt"></i>
                                  </a>
                                  <form action="{{ route('hapus-waktu', $item->id) }}" method="POST" id="delete-waktu{{$item->id}}"class="d-inline">
                                   @csrf
                                   @method('delete')
                                   <button type="button" class="btn btn-danger" onclick="confirmDelete({{$item->id}})">
                                      <i class="fa fa-trash"></i>
                                  </button>
                                </form>
                              </td>
                          </tr>
                      @empty
                          <td colspan="4" class="text-center">
                              Data Kosong
                          </td>
                      @endforelse
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
    </div>
    <!-- /.container-fluid -->
@endsection

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
function confirmDelete(id) {
swal({
   title: 'Apakah Anda Yakin?',
                  text: "Anda Tidak Akan Dapat Mengembalikannya!",
                  icon: 'warning',
                  buttons: true,
                  dangerMode: true,
})
.then((willDelete) => {
                    if (willDelete) {
                        $('#delete-waktu'+id).submit();
                    } else {
                        swal({
                            text: "Data aman tersimpan!",
                        });
                    }
                });
}
</script>

