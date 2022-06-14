@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
	<h2>Showing {{ $paket->id_paket }}</h2>
	<div class="jumbotron text-center">
		<p>
			<strong>ID Paket : </strong>{{ $paket->id_paket }}<br>
			<strong>Nama Paket : </strong>{{ $paket->nama_paket }}<br>
			<strong>Iuran : </strong>{{ number_format($paket->iuran,0,',','.') }}<br>
			<strong>Premi : </strong>{{ number_format($paket->premi,0,',','.') }}<br>
			<strong>Operasional : </strong>{{ number_format($paket->operasional,0,',','.') }}<br>
			<strong>Cadangan : </strong>{{ number_format($paket->cadangan,0,',','.') }}<br><br>
			<a class="btn btn-primary btn-sm" href="{{ URL::to('paket') }}">Go Back</a>
		</p>
	</div>
@stop