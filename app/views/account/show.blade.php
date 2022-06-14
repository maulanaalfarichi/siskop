@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
	<h2>Showing {{ $account->id }}</h2>
	<div class="jumbotron text-center">
		<p>
			<strong>Account ID : </strong>{{ $account->id }}<br>
			<strong>Account Name : </strong>{{ $account->account_name }}<br><br>
			<a class="btn btn-primary btn-sm" href="{{ URL::to('account') }}">Go Back</a>
		</p>
	</div>
@stop