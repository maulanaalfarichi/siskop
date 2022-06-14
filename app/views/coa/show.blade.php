@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
	<h2>Showing {{ $coa->id }}</h2>
	<div class="jumbotron text-center">
		<p>
			<strong>Cart of Account : </strong>{{ $coa->id }}<br><br>
			<a class="btn btn-primary btn-sm" href="{{ URL::to('coa') }}">Go Back</a>
		</p>
	</div>
@stop