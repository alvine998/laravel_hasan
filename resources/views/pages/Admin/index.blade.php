@extends('layout.admin')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Data pengguna</h1>
        
           <!-- Topbar Search -->
         <a href="{{ route('tambah-pengguna') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
         <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data pengguna
          </a>
     </div>
<!-- Content Row -->
      <div class="row">
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="admintable1" width="100%" cellspacing="0">
                      <thead>
                      <tr>
                          <th>NO.</th>
                          <th>nama pengguna</th>
                          <th>alamat</th>
                          <th>username</th>
                          <th>roles</th>
                          <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      @php $i=1 @endphp
                      @forelse($items as $item)
                          <tr>
                              <td>{{ $i++ }}</td>
                              <td>{{ $item->nama_pengguna }}</td>
                              <td>{{ $item->alamat }}</td>
                              <td>{{ $item->username }}</td>
                              <td>{{ $item->roles }}</td>
                              <td>
                                  <a href="{{ route('edit-pengguna', $item->id_pengguna) }}" class="btn btn-info">
                                      <i class="fa fa-pencil-alt"></i>
                                  </a>
                                  <form action="{{ route('hapus-pengguna', $item->id_pengguna) }}" method="POST" id="delete-pengguna{{$item->id_pengguna}}"class="d-inline">
                                   @csrf
                                   @method('delete')
                                   <button type="button" class="btn btn-danger" onclick="confirmDelete({{$item->id_pengguna}})">
                                      <i class="fa fa-trash"></i>
                                  </button>
                                </form>
                              </td>
                          </tr>
                      @empty
                          <td colspan="7" class="text-center">
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
function confirmDelete(id_pengguna) {
swal({
   title: 'Apakah Anda Yakin?',
                  text: "Anda Tidak Akan Dapat Mengembalikannya!",
                  icon: 'warning',
                  buttons: true,
                  dangerMode: true,
})
.then((willDelete) => {
                    if (willDelete) {
                        $('#delete-pengguna'+id_pengguna).submit();
                    } else {
                        swal({
                            text: "Data aman tersimpan!",
                        });
                    }
                });
}
</script>