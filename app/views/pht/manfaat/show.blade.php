@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
	<div class="col-md-4">
		<table class="table table-striped table-hover">
			<tr><td>ID Paket</td><td><strong>{{ $manfaat->id_paket }}</strong></td></tr>
			<tr><td>Nama Paket</td><td><strong>{{ $manfaat->paket->nama_paket }}</strong></td></tr>
			<tr><td>Bulan</td><td><strong>{{ $manfaat->bulan }}</strong></td></tr>
			<tr><td>Manfaat</td><td><strong>{{ number_format($manfaat->manfaat,2,',','.') }}</strong></td></tr>
			<tr><td>Santunan</td><td><strong>{{ number_format($manfaat->santunan,2,',','.') }}</strong></td></tr>
			<tr><td>Tambahan</td><td><strong>{{ number_format($manfaat->tambahan,2,',','.') }}</strong></td></tr>
		</table><br>
		<a class="btn btn-primary btn-sm" href="{{ URL::to('manfaat') }}">Go Back</a>
	</div>
@stop