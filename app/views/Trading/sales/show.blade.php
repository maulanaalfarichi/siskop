@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
	<h2>Showing {{ $sales->id }}</h2>
	<div class="jumbotron text-center">
		<p>
			<strong>Nama Sales : </strong>{{ $sales->nama_sales }}<br><br>
			<a class="btn btn-primary btn-sm" href="{{ URL::to('sales') }}">Go Back</a>
		</p>
	</div>
@stop