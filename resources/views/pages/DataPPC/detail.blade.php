@extends('layout.opmanager')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Perencanaan {{ $item->tb_kustomers->nama_kustomer }}</h1>
        <a href="{{ route('data-perencanaan') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm">
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
                        <th width="200px">Nama kustomer</th>
                        <td width="200px">{{ $item->tb_kustomers->nama_kustomer }}</td>
                    </tr>
                    <tr>
                        <th>Nama Komponens</th>
                        <td>{{ $item->tb_kustomers->tb_komponens->nama_komponen}}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Produksi</th>
                        <td>{{ $item->tanggal_produksi }}</td>
                    </tr>
                    <tr>
                        <th>Plan</th>
                        <td>{{ $item->plan }}</td>
                    </tr>
                    <tr>
                        <th>Actual</th>
                        <td>{{ $item->actual }}</td>
                    </tr>
                    
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection

