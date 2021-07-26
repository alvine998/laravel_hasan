@extends('layout.ppc')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Data Waktu Standar</h1>
     </div>
<!-- Content Row -->
      <div class="row">
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="ppctable1" width="100%" cellspacing="0">
                      <thead>
                      <tr>
                          <th>nama komponen</th>
                          <th>nama mesin</th>
                          <th>waktu Standar</th>
                          <th>jumlah Standar</th>
                          <th width="10%">Action</th>
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
                            <a href="{{ route('data-detailwaktu', $item->id) }}" class="btn bt-xs btn-info btn-sm">
                                <i class="fa fa-eye"></i>
                                 </a>
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

