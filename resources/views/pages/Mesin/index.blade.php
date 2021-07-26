@extends('layout.admin')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Data Mesin</h1>
        
           <!-- Topbar Search -->
         <a href="{{ route('tambah-mesin') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
         <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Mesin
          </a>
     </div>
<!-- Content Row -->
      <div class="row">
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="admintable1" width="100%" cellspacing="0">
                      <thead>
                      <tr>
                          <th width="5%">NO.</th>
                          <th width="20%">nama mesin</th>
                          <th width="5%">Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      @php $i=1 @endphp
                      @forelse($items as $item)
                          <tr>
                              <td>{{ $i++}}</td>
                              <td>{{ $item->nama_mesin }}</td>
                              <td>
                                  <a href="{{ route('edit-mesin', $item->id_mesin) }}" class="btn btn-info ">
                                      <i class="fa fa-pencil-alt"></i>
                                  </a>
                                  <form action="{{ route('hapus-mesin', $item->id_mesin) }}" method="POST" id="delete-mesin{{$item->id_mesin}}"class="d-inline">
                                   @csrf
                                   @method('delete')
                                   <button type="button" class="btn btn-danger" onclick="confirmDelete({{$item->id_mesin}})">
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
function confirmDelete(id_mesin) {
swal({
   title: 'Apakah Anda Yakin?',
                  text: "Anda Tidak Akan Dapat Mengembalikannya!",
                  icon: 'warning',
                  buttons: true,
                  dangerMode: true,
})
.then((willDelete) => {
                    if (willDelete) {
                        $('#delete-mesin'+id_mesin).submit();
                    } else {
                        swal({
                            text: "Data aman tersimpan!",
                        });
                    }
                });
}
</script>