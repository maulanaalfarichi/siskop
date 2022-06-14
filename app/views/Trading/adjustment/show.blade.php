@extends('layouts.trading')
@section('navbar')
@parent
@stop

@section('content')
	<h2>Showing {{ $data->id }}</h2>
	<div class="jumbotron text-center">
		<p>
			<strong>Tanggal Adjustment : </strong>{{ $data->tanggal_adjust }}<br>
			<strong>ID Barang : </strong>{{ $data->id_barang }}<br>
			<strong>Nama Barang : </strong>{{ $data->barang->nama_barang }}<br>
			<strong>Jenis Adjust : </strong>{{ $data->jenis_adjust }}<br>
			<strong>Jumlah Adjustment : </strong>{{ $data->jml_adjust }}<br>
			<strong>Keterangan : </strong>{{ $data->keterangan }}<br><br>
			<a class="btn btn-primary btn-sm" href="{{ URL::to('adjustment') }}">Go Back</a>
		</p>
	</div>
@stop