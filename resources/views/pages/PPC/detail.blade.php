@extends('layout.ppc')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
     <a href="{{ route('perencanaan-ppc') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm">
        <i class="fas fa-angle-double-left"></i> Kembali
          </a>
    <!-- Page Heading -->
<!-- Content Row -->
      <div class="row">
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="ppctable1" width="100%" cellspacing="0">
                      <thead>
                      <tr>
                          <th>nama kustomer</th>
                          <th>nama komponen</th>
                          <th>tanggal produksi</th>
                          <th>jumlah komponen actual</th>
                          <th>status</th>
                        
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

