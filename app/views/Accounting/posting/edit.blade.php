@extends('layouts.accounting')
@section('navbar')
@parent
@stop

@section('content')
	<h2>Showing {{ $data->no_bukti }}</h2>
	<div class="col-md-6">
		<table class="table table-stripped table-hover">
		<tr><td>No Bukti</td><td><strong>{{ $data->no_bukti }}</strong></td></tr>
		<tr><td>Tanggal</td><td><strong>{{ date('d M Y',strtotime($data->tanggal)) }}</strong></td></tr>
		<tr><td>Keterangan</td><td><strong>{{ $data->keterangan }}</strong></td></tr>
		</table><br><br>
	</div>
	
	<table class="table table-stripped table-bordered table-hover">
	<thead>
		<tr><th>ID</th><th>ID Rekening</th><th>Nama Rekening</th><th>Debet</th>
		<th>Kredit</th></tr>
	</thead>
	<tbody>
		@foreach($detail as $key => $value)
			<tr>
				<td>{{ $value->id }}</td>
				<td>{{ $value->id_rekening }}</td>
				<td>{{ $value->accrekening->nama_rekening }}</td>
				<td>{{ number_format($value->debet,2,',','.') }}</td>
				<td>{{ $value->kredit }}</td>
			</tr>
		@endforeach
	</tbody>
	<tfooter>
		<tr>
			<td colspan="3"><strong>TOTAL</strong></td>
			<Td><strong>{{ number_format($data->debet,2,',','.') }}</strong></td>
			<td><strong>{{ number_format($data->kredit,2,',','.') }}</strong></td>
		</tr>
	</tfooter>
	</table>
	<a class="btn btn-primary btn-sm" href="{{ URL::to('posting/'.$data->tanggal ) }}">Go Back</a>
@stop