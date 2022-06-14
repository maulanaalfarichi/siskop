@extends('layouts.usp')
@section('navbar')
@parent
@stop

@section('content')
	<h2>Showing {{ $data->id }}</h2>
	<div class="jumbotron text-center">
		<p>
			<strong>tanggal_ambil : </strong>{{ date('d M Y',strtotime($data->tanggal_ambil)) }}<br>
			<strong>id_anggota : </strong>{{ $data->id_anggota }}<br>
			<strong>jumlah : </strong>{{ number_format($data->jumlah,2,',','.') }}<br><br>
			<a class="btn btn-primary btn-sm" href="{{ URL::to('pengambilan') }}">Go Back</a>
		</p>
	</div>
@stop