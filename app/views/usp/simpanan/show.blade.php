@extends('layouts.usp')
@section('navbar')
@parent
@stop

@section('content')
	<h2>Showing {{ $data->id }}</h2>
	<div class="jumbotron text-center">
		<p>
			<strong>Tanggal Simpan : </strong>{{ date('d M Y',strtotime($data->tanggal_simpan)) }}<br>
			<strong>Id Koperasi : </strong>{{ $data->id_koperasi }}<br>
			<strong>Nama Koperasi : </strong>{{ $data->nama_koperasi }}<br>
			<strong>Jenis Simpanan : </strong>{{ $data->jenis_simpanan }}<br>
			<strong>Jumlah : </strong>{{ $data->jumlah }}<br><br>
			<a class="btn btn-primary btn-sm" href="{{ URL::to('simpanan') }}">Go Back</a>
		</p>
	</div>
@stop