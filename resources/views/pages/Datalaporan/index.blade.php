@extends('layout.opmanager')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800"> Data Laporan Harian Produksi</h1>
     </div>
<!-- Content Row -->
      <div class="row">
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="opmanagertable1" width="100%" cellspacing="0">
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
                               @if($item->status == null)
                              <td>
                                 <a href="{{ route('data-setuju-laporan', $item->id) }}" class="btn bt-xs btn-primary btn-sm">
                                     <i class="fas fa-check"></i>
                                  </a>
                                <a href="{{ route('data-tolak-laporan', $item->id) }}" class="btn bt-xs btn-danger btn-sm">
                                   <i class="fas fa-times-circle"></i>
                                </a> 
                                <a href="{{ route('data-detail-laporan', $item->id) }}" class="btn bt-xs btn-info btn-sm">
                                      <i class="fa fa-eye"></i>
                                </a> 
                              </td>
                              @elseif($item->status == 1)
                              <td>
                              <a href="{{ route('data-tolak-laporan', $item->id) }}" class="btn bt-xs btn-danger btn-sm">
                                   <i class="fas fa-times-circle"></i>
                                </a>   
                              <a href="{{ route('data-detail-laporan', $item->id) }}" class="btn bt-xs btn-info btn-sm">
                                      <i class="fa fa-eye"></i>
                                 </a>
                             </td>
                              @elseif($item->status == 2)
                              <td>
                              <a href="{{ route('data-setuju-laporan', $item->id) }}" class="btn bt-xs btn-primary btn-sm">
                                   <i class="fas fa-times-check"></i>
                                </a>
                             <a href="{{ route('data-detail-laporan', $item->id) }}" class="btn bt-xs btn-info btn-sm">
                                      <i class="fa fa-eye"></i>
                                 </a>
                              </td>       
                              @endif
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

