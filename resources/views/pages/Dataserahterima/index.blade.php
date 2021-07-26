@extends('layout.opmanager')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Data Serah Terima</h1>
     </div>
<!-- Content Row -->
      <div class="row">
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="opmanagertable1" width="100%" cellspacing="0">
                      <thead>
                      <tr>
                          <th>nama kustomer</th>
                          <th>nama komponen</th>
                          <th>tanggal produksi</th>
                          <th>Jumlah Komponen</th>
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
                              @if($item->status == null)
                              <td>
                                 <a href="{{ route('data-setuju-terima', $item->id) }}" class="btn bt-xs btn-primary btn-sm">
                                     <i class="fas fa-check"></i>
                                  </a>
                                <a href="{{ route('data-tolak-terima', $item->id) }}" class="btn bt-xs btn-danger btn-sm">
                                   <i class="fas fa-times-circle"></i>
                                </a> 
                                <a href="{{ route('data-detail-terima', $item->id) }}" class="btn bt-xs btn-info btn-sm">
                                      <i class="fa fa-eye"></i>
                                </a> 
                              </td>
                              @elseif($item->status == 1)
                              <td>
                              <a href="{{ route('data-tolak-terima', $item->id) }}" class="btn bt-xs btn-danger btn-sm">
                                   <i class="fas fa-times-circle"></i>
                                </a>   
                              <a href="{{ route('data-detail-terima', $item->id) }}" class="btn bt-xs btn-info btn-sm">
                                      <i class="fa fa-eye"></i>
                                 </a>
                             </td>
                              @elseif($item->status == 2)
                              <td>
                              <a href="{{ route('data-setuju-terima', $item->id) }}" class="btn bt-xs btn-primary btn-sm">
                                   <i class="fas fa-times-check"></i>
                                </a>
                             <a href="{{ route('data-detail-terima', $item->id) }}" class="btn bt-xs btn-info btn-sm">
                                      <i class="fa fa-eye"></i>
                                 </a>
                              </td>       
                              @endif
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

