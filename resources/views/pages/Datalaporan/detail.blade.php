@extends('layout.opmanager')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail laporan Harian {{ $item->tb_komponens->nama_komponen }}</h1>
        <a href="{{ route('data-laporan') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm">
        <i class="fas fa-angle-double-left"></i> Kembali
          </a>
      </div>

      <!-- Content Row -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-bordered">
                 <td colspan="2" align="left">
                 <img src="{{ url('forntend\images\imageedit_4_9087602155.png') }}" width="30px" height="30px" alt="...">
                 PT Nusa Indah Jaya Utama 
                 </td>
                    <tr>
                        <th width="200px">Nama Komponen</th>
                        <td width="200px">{{ $item->tb_komponens->nama_komponen }}</td>
                    </tr>
                    <tr>
                        <th>Nama Mesin</th>
                        <td>{{ $item->tb_komponens->tb_mesins->nama_mesin}}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Produksi</th>
                        <td>{{ $item->tanggal_produksi }}</td>
                    </tr>
                    <tr>
                        <th>Qty Produksi</th>
                        <td>{{ $item->qty_prod }}</td>
                    </tr>
                    <tr>
                        <th>Good</th>
                        <td>{{ $item->good }}</td>
                    </tr>
                    <tr>
                        <th>Not Good</th>
                        <td>{{ $item->not_good }}</td>
                    </tr>
                    <tr>
                        <th>Masalah</th>
                        <td>{{ $item->masalah }}</td>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <td>{{ $item->keterangan }}</td>
                    </tr>
                     <tr>
                        <th>Mesin</th>
                        <td>
                            <table class="table table-bordered">
                                <tr>
                                    <th>ID Mesin</th>
                                    <th>Nama Mesin</th>
                                </tr>
                                
                                    <tr>
                                        <td>{{ $item->id_mesin }}</td>
                                        <td>{{ $item->tb_komponens->tb_mesins->nama_mesin }}</td>
                                    </tr>
                               
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection

