@extends('layout.opmanager')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Data Perencanaan Produksi</h1>
     </div>
<!-- Content Row -->
      <div class="row">
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="opmanagertable1" width="100%" cellspacing="0">
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
                              @if($item->status == null)
                              <td>
                                 <a href="{{ route('data-setuju', $item->id_perencanaan) }}" class="btn bt-xs btn-primary btn-sm">
                                     <i class="fas fa-check"></i>
                                  </a>
                                <a href="{{ route('data-tolak', $item->id_perencanaan) }}" class="btn bt-xs btn-danger btn-sm">
                                   <i class="fas fa-times-circle"></i>
                                </a> 
                                <a href="{{ route('data-detail', $item->id_perencanaan) }}" class="btn bt-xs btn-info btn-sm">
                                      <i class="fa fa-eye"></i>
                                </a> 
                              </td>
                              @elseif($item->status == 1)
                              <td>
                              <a href="{{ route('data-tolak', $item->id_perencanaan) }}" class="btn bt-xs btn-danger btn-sm">
                                   <i class="fas fa-times-circle"></i>
                                </a>   
                              <a href="{{ route('data-detail', $item->id_perencanaan) }}" class="btn bt-xs btn-info btn-sm">
                                      <i class="fa fa-eye"></i>
                                 </a>
                             </td>
                              @elseif($item->status == 2)
                              <td>
                              <a href="{{ route('data-setuju', $item->id_perencanaan) }}" class="btn bt-xs btn-primary btn-sm">
                                   <i class="fas fa-times-check"></i>
                                </a>
                             <a href="{{ route('data-detail', $item->id_perencanaan) }}" class="btn bt-xs btn-info btn-sm">
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

