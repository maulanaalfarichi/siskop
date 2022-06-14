@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
	<h2>Showing {{ $divisi->id }}</h2>
	<div class="jumbotron text-center">
		<p>
			<strong>Division ID : </strong>{{ $divisi->id }}<br>
			<strong>Division Name : </strong>{{ $divisi->division_name }}<br><br>
			<a class="btn btn-primary btn-sm" href="{{ URL::to('division') }}">Go Back</a>
		</p>
	</div>
@stop