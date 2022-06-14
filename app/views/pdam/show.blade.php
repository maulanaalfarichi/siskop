@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
	<h2>Showing {{ $pdam->id_pdam }}</h2>
	<div class="jumbotron text-center">
		<p>
			<strong>ID PDAM : </strong>{{ $pdam->id_pdam }}<br>
			<strong>Nama PDAM : </strong>{{ $pdam->nama_pdam }}<br>
			<strong>Alamat : </strong>{{ $pdam->alamat }}<br>
			<strong>Telpon : </strong>{{ $pdam->telepon }}<br>
			<strong>Fax : </strong>{{ $pdam->fax }}<br><br>
			<a class="btn btn-primary btn-sm" href="{{ URL::to('pdam') }}">Go Back</a>
		</p>
	</div>
@stop