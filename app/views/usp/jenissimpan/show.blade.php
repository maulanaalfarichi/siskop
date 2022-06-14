@extends('layouts.usp')
@section('navbar')
@parent
@stop

@section('content')
	<h2>Showing {{ $jenissimpan->id }}</h2>
	<div class="jumbotron text-center">
		<p>
			<strong>Jenis Simpanan : </strong>{{ $jenissimpan->jenis_simpanan }}<br>
			<strong>Jumlah : </strong>{{ number_format($jenissimpan->jumlah,2,',','.') }}<br><br>
			<a class="btn btn-primary btn-sm" href="{{ URL::to('jenissimpanan') }}">Go Back</a>
		</p>
	</div>
@stop