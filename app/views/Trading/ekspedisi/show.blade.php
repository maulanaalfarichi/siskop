@extends('layouts.trading')
@section('navbar')
@parent
@stop

@section('content')
	<h2>Showing {{ $ekspedisi->id }}</h2>
	<div class="jumbotron text-center">
		<p>
			<strong>Nama Ekspedisi : </strong>{{ $ekspedisi->nama }}<br>
			<strong>Alamat : </strong>{{ $ekspedisi->alamat }}<br>
			<strong>Kota : </strong>{{ $ekspedisi->kota }}<br>
			<strong>Contact : </strong>{{ $ekspedisi->contact }}<br>
			<strong>Telpon : </strong>{{ $ekspedisi->telp }}<br>
			<strong>Daerah : </strong>{{ $ekspedisi->daerah }}<br>
			<strong>Email : </strong>{{ $ekspedisi->email }}<br><br>
			<a class="btn btn-primary btn-sm" href="{{ URL::to('ekspedisi') }}">Go Back</a>
		</p>
	</div>
@stop