@extends('layout.produksi')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Laporan Harian Produksi</h1>
         <a href="{{ route('tambah-laporan') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
         <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Laporan Harian
          </a>
     </div>
     <div class="d-sm-flex mb-0">
      <div class="form-group">
                        <label for="label">Tanggal Awal</label>
                        <input type="date" class="form-control" name="tglawal" id="tglawal" placeholder="tanggal awal">
                    </div>
          <div class="form-group px-md-2">
                        <label for="label">Tanggal Akhir</label>
                        <input type="date" class="form-control" name="tglakhir" id="tglakhir" placeholder="tanggal akhir">
                    </div>        
                    </div>     
      <div>
      <a href="" onclick="this.href ='/cetak-laporan/'+ document.getElementById('tglawal').value +
      '/' + document.getElementById('tglakhir').value " target="_blank" class=" d-done d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fa fa-print fa-sm text-white-50"></i> Cetak</a>                          
      </div>                 
<!-- Content Row -->
      <div class="row">
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="produksitable1" width="100%" cellspacing="0">
                      <thead>
                      <tr>
                          <th>Nama komponen</th>
                          <th>Nama mesin</th>
                          <th>Tanggal produksi</th>
                          <th>status</th>
                          <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      @forelse($items as $item)
                          <tr>
                              <td>{{ $item->tb_komponens->nama_komponen }}</td>
                              <td>{{ $item->tb_komponens->tb_mesins->nama_mesin }}</td>
                              <td>{{ $item->tanggal_produksi }}</td>
                              @if($item->status == null)
                              <td><span class="badge badge-warning">Menunggu validasi</span></td>
                              @elseif($item->status == 1)
                              <td><span class="badge badge-success">Disetujui</span></td>
                              @elseif($item->status == 2)
                              <td><span class="badge badge-danger">Ditolak</span></td>
                              @endif
                              <td>
                                  <a href="{{ route('edit-laporan', $item->id) }}" class="btn btn-info ">
                                      <i class="fa fa-pencil-alt"></i>
                                  </a>
                                  <form action="{{ route('hapus-laporan', $item->id) }}" method="POST" id="delete-laporan{{$item->id}}"class="d-inline">
                                   @csrf
                                   @method('delete')
                                   <button type="button" class="btn btn-danger" onclick="confirmDelete({{$item->id}})">
                                      <i class="fa fa-trash"></i>
                                  </button>
                                </form>
                              </td>
                          </tr>
                      @empty
                          <td colspan="6" class="text-center">
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
                        $('#delete-laporan'+id).submit();
                    } else {
                        swal({
                            text: "Data aman tersimpan!",
                        });
                    }
                });
}
</script>

