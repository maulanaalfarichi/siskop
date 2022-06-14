@extends('layouts.trading')
@section('navbar')
@parent
@stop

@section('content')
	<h2>Showing {{ $data->id }}</h2>
	<div class="jumbotron text-center">
		<p>
			<strong>Nama Barang : </strong>{{ $data->nama_barang }}<br>
			<strong>Stok : </strong>{{ $data->stok }}<br><br>
			<a class="btn btn-primary btn-sm" href="{{ URL::to('barang') }}">Go Back</a>
		</p>
	</div>
@stop