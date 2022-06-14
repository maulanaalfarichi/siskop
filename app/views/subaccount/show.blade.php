@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
	<h2>Showing {{ $subaccount->id }}</h2>
	<div class="jumbotron text-center">
		<p>
			<strong>SubAccount ID : </strong>{{ $subaccount->id }}<br>
			<strong>SubAccount Name : </strong>{{ $subaccount->subaccount_name }}<br><br>
			<a class="btn btn-primary btn-sm" href="{{ URL::to('subaccount') }}">Go Back</a>
		</p>
	</div>
@stop