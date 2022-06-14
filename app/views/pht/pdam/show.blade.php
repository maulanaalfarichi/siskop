@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
	<div class="col-md-6">
		<table class="table table-striped table-hover">
			<tr><td>ID PDAM</td><td><strong>{{ $pdam->id_pdam }}</strong></td></tr>
			<tr><td>Nama PDAM</td><td><strong>{{ $pdam->nama_pdam }}</strong></td></tr>
			<tr><td>Alamat</td><td><strong>{{ $pdam->alamat }}</strong></td></tr>
			<tr><td>Telpon</td><td><strong>{{ $pdam->telepon }}</strong></td></tr>
			<tr><td>Fax</td><td><strong>{{ $pdam->fax }}</strong></td></tr>
		</table><br>
		<a class="btn btn-primary btn-sm" href="{{ URL::to('pdam') }}">Go Back</a>
	</div>
@stop