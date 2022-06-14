@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
	<h2>Showing {{ $manfaat->id }}</h2>
	<div class="jumbotron text-center">
		<p>
			<strong>ID Paket : </strong>{{ $manfaat->id_paket }}<br>
			<strong>Nama Paket : </strong>{{ $manfaat->paket->nama_paket }}<br>
			<strong>Bulan : </strong>{{ $manfaat->bulan }}<br>
			<strong>Manfaat : </strong>{{ number_format($manfaat->manfaat,2,',','.') }}<br>
			<strong>Santunan : </strong>{{ number_format($manfaat->santunan,2,',','.') }}<br>
			<strong>Tambahan : </strong>{{ number_format($manfaat->tambahan,2,',','.') }}<br><br>
			<a class="btn btn-primary btn-sm" href="{{ URL::to('manfaat') }}">Go Back</a>
		</p>
	</div>
@stop