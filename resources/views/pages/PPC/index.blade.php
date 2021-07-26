@extends('layout.ppc')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Perencanaan Produksi</h1>
        
           <!-- Topbar Search -->
         <a href="{{ route('tambah-ppc') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
         <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Perencanaan
          </a>
     </div>
      <a href="{{ route('detail-produksi') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
         <i class="fas fa-eye fa-sm text-white-50"></i> Jumlah Actual Pasca Produksi
          </a>
<!-- Content Row -->
      <div class="row">
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="ppctable1" width="100%" cellspacing="0">
                      <thead>
                      <tr>
                          <th>nama kustomer</th>
                          <th>tanggal produksi</th>
                          <th>plan</th>
                          <th>actual</th>
                          <th>status</th>
                          <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      @forelse($items as $item)
                          <tr>
                              <td>{{ $item->tb_kustomers->nama_kustomer }}</td>
                              <td>{{ $item->tanggal_produksi }}</td>
                              <td>{{ $item->plan }}</td>
                              <td>{{ $item->actual}}</td>
                              @if($item->status == null)
                              <td><span class="badge badge-warning">Menunggu validasi</span></td>
                              @elseif($item->status == 1)
                              <td><span class="badge badge-success">Disetujui</span></td>
                              @elseif($item->status == 2)
                              <td><span class="badge badge-danger">Ditolak</span></td>
                              @endif
                              <td>
                                  <a href="{{ route('edit-ppc', $item->id_perencanaan) }}" class="btn btn-info ">
                                      <i class="fa fa-pencil-alt"></i>
                                  </a>
                                  <form action="{{ route('hapus-ppc', $item->id_perencanaan) }}" method="POST" id="delete-perencanaan{{$item->id_perencanaan}}"class="d-inline">
                                   @csrf
                                   @method('delete')
                                   <button type="button" class="btn btn-danger" onclick="confirmDelete({{$item->id_perencanaan}})">
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
function confirmDelete(id_perencanaan) {
swal({
   title: 'Apakah Anda Yakin?',
                  text: "Anda Tidak Akan Dapat Mengembalikannya!",
                  icon: 'warning',
                  buttons: true,
                  dangerMode: true,
})
.then((willDelete) => {
                    if (willDelete) {
                        $('#delete-perencanaan'+id_perencanaan).submit();
                    } else {
                        swal({
                            text: "Data aman tersimpan!",
                        });
                    }
                });
}
</script>
