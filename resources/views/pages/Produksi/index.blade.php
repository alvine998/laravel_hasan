@extends('layout.produksi')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Serah Terima Barang</h1>
         <a href="{{ route('tambah-produksi') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
         <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Serah Terima
          </a>
     </div>
<!-- Content Row -->
      <div class="row">
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="produksitable1" width="100%" cellspacing="0">
                      <thead>
                      <tr>
                          <th>nama kustomer</th>
                          <th>nama komponen</th>
                          <th>tanggal produksi</th>
                          <th>jumlah komponen</th>
                          <th>status</th>
                          <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      @forelse($items as $item)
                          <tr>
                              <td>{{ $item->tb_kustomers->nama_kustomer }}</td>
                              <td>{{ $item->tb_kustomers->tb_komponens->nama_komponen }}</td>
                              <td>{{ $item->tanggal_produksi }}</td>
                              <td>{{ $item->jumlah_komponen }}</td>
                              @if($item->status == null)
                              <td><span class="badge badge-warning">Menunggu validasi</span></td>
                              @elseif($item->status == 1)
                              <td><span class="badge badge-success">Disetujui</span></td>
                              @elseif($item->status == 2)
                              <td><span class="badge badge-danger">Ditolak</span></td>
                              @endif
                              <td>
                                  <a href="{{ route('edit-produksi', $item->id) }}" class="btn btn-info ">
                                      <i class="fa fa-pencil-alt"></i>
                                  </a>
                                   <form action="{{ route('hapus-produksi', $item->id) }}" method="POST" id="delete-produksi{{$item->id}}"class="d-inline">
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
                        $('#delete-produksi'+id).submit();
                    } else {
                        swal({
                            text: "Data aman tersimpan!",
                        });
                    }
                });
}
</script>



