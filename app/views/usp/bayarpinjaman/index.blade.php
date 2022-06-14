@extends('layouts.usp')
@section('navbar')
@parent
@stop

@section('content')

<h2>View All Bayar Pinjaman</h2><br>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

<table class="table table-stripped table-bordered table-hover">
<thead>
	<tr><th>ID</th><th>Tanggal Pinjam</th><th>Id Anggota</th>
	<th>Jangka Waktu</th><th>Pinjaman</th>
	<th>Jml Angsuran</th><th>Total_angsuran</th>
	<th>Jml Sisa Cicilan</th><th>Total Sisa Cicilan</th><th>Action</th></tr>
</thead>
<tbody>
	@foreach($data as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ date('d M Y',strtotime($value->tanggal_pinjam)) }}</td>
			<td>{{ $value->id_anggota }}</td>
			<td>{{ $value->jangka_waktu }}</td>
			<td>{{ number_format($value->maksimum_pembiayaan,2,',','.') }}</td>
			<td>{{ $value->jml_angsuran }}</td>
			<td>{{ number_format($value->total_angsuran,2,',','.') }}</td>
			<td>{{ $value->jml_sisa_cicilan }}</td>
			<td>{{ number_format($value->total_sisa_cicilan,2,',','.') }}</td>
			<td>
				<a class="btn btn-success btn-sm" href="{{ URL::to('bayarpinjaman/'.$value->id) }}">Detail</a>
			</td>
		</tr>
	@endforeach
</tbody>
</table>

{{ $data->links() }}

@stop