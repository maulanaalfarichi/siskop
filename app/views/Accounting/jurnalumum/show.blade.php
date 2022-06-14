@extends('layouts.accounting')
@section('navbar')
@parent
@stop

@section('content')
	<h2>Showing {{ $jurnal->no_bukti }}</h2>
	<div class="col-md-6">
		<table class="table table-striped table-hover">
			<tr><td>No. Bukti</td><td><strong>{{ $jurnal->no_bukti }}</strong></td></tr>
			<tr><td>Tanggal</td><td><strong>{{ date('d M Y',strtotime($jurnal->tanggal)) }}</strong></td></tr>
			<tr><td>Keterangan</td><td><strong>{{ $jurnal->keterangan }}</strong></td></tr>
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
				<td>{{ number_format($value->kredit,2,',','.') }}</td>
			</tr>
		@endforeach
		<tr>
			<td colspan="3"><strong>TOTAL</strong></td>
			<td><strong>{{ number_format($jurnal->debet,2,',','.') }}</strong></td>
			<td><strong>{{ number_format($jurnal->kredit,2,',','.') }}</strong></td>
		
		</tr>
	</tbody>
	</table>
	<a class="btn btn-primary btn-sm" href="{{ URL::to('jurnalumum') }}">Go Back</a>
@stop