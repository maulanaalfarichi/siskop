@extends('layouts.trading')
@section('navbar')
@parent
@stop

@section('content')
	<h2>Showing {{ $data->id }}</h2>
	<div class="jumbotron text-center">
		<p>
			<strong>Nama Pelanggan : </strong>{{ $data->nama_pelanggan }}<br>
			<strong>Alamat : </strong>{{ $data->alamat }}<br>
			<strong>Contact : </strong>{{ $data->contact }}<br>
			<strong>Telpon : </strong>{{ $data->telpon }}<br>
			<strong>Fax : </strong>{{ $data->fax }}<br><br>
			<a class="btn btn-primary btn-sm" href="{{ URL::to('pelanggan') }}">Go Back</a>
		</p>
	</div>
@stop