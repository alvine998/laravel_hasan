<html>
<head>
	<title>Laporan Harian Produksi PT Nusa Indah Jaya Utama</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<center>
			<h4>Laporan Harian Produksi PT Nusa Indah Jaya Utama</h4>
		</center>
		<br/>
		<table class='table table-bordered'>
			<thead>
            <td colspan="9" align="left">
                 <img src="{{ url('forntend\images\imageedit_4_9087602155.png') }}" width="30px" height="30px" alt="...">
                <b> PT Nusa Indah Jaya Utama </b>
                 </td>
				<tr>
					<th>No</th>
					<th>Nama Komponen</th>
					<th>Nama Mesin</th>
					<th>Tanggal Produksi</th>
					<th>Qty</th>
					<th>Good</th>
                    <th>Not Good</th>
                    <th>Masalah</th>
                    <th>Keterangan</th>
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp
				@foreach($peg as $item)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{ $item->tb_komponens->nama_komponen }}</td>
					<td>{{ $item->tb_komponens->tb_mesins->nama_mesin}}</td>
					<td>{{ $item->tanggal_produksi }}</td>
					<td>{{ $item->qty_prod }}</td>
                    <td>{{ $item->good }}</td>
                    <td>{{ $item->not_good }}</td>
                    <td>{{ $item->masalah }}</td>
                    <td>{{ $item->keterangan }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
 
	</div>
 
</body>
</html>