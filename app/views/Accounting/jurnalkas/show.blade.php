@extends('layouts.accounting')
@section('navbar')
@parent
@stop

@section('content')
	<h2>Showing {{ $jurnal->no_bukti }}</h2>
	<div class="jumbotron text-center">
		<p>
			<strong>No Bukti : </strong>{{ $jurnal->no_bukti }}<br>
			<strong>Tanggal : </strong>{{ date('d M Y',strtotime($jurnal->tanggal)) }}<br>
			<strong>Keterangan : </strong>{{ $jurnal->keterangan }}<br>
			<strong>Total Debet : </strong>{{ number_format($jurnal->debet,2,',','.') }}<br>
			<strong>Total Kredit : </strong>{{ number_format($jurnal->kredit,2,',','.') }}<br><br>
			<a class="btn btn-primary btn-sm" href="{{ URL::to('jurnalumum') }}">Go Back</a>
		</p>
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
	</table>
@stop