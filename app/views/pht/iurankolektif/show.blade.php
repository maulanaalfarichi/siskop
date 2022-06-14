@extends('layouts.master')
@section('navbar')
@parent
@stop

@section('content')
	<h2>Showing {{ $bank->id_bank }}</h2>
	<div class="jumbotron text-center">
		<p>
			<strong>ID Bank : </strong>{{ $bank->id_bank }}<br>
			<strong>Nama Bank : </strong>{{ $bank->nama_bank }}<br><br>
			<a class="btn btn-primary btn-sm" href="{{ URL::to('bank') }}">Go Back</a>
		</p>
	</div>
@stop