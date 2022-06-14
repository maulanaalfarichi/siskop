@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
	<h2>Showing {{ $status->id_status }}</h2>
	<div class="jumbotron text-center">
		<p>
			<strong>ID Status : </strong>{{ $status->id_status }}<br>
			<strong>Keterangan : </strong>{{ $status->keterangan }}<br>
			<strong>Tarif : </strong>{{ $status->tarif." %" }}<br><br>
			<a class="btn btn-primary btn-sm" href="{{ URL::to('status') }}">Go Back</a>
		</p>
	</div>
@stop