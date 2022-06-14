@extends('layouts.usp')
@section('navbar')
@parent
@stop

@section('content')
	<h2>Showing {{ $data->id }}</h2>
	<div class="jumbotron text-center">
		<p>
			<strong>Nama Anggota : </strong>{{ $data->nama_anggota }}<br>
			<strong>Jenis Kelamin : </strong>{{ $data->jk }}<br>
			<strong>Tempat Lahir : </strong>{{ $data->tempat_lahir }}<br>
			<strong>Tanggal Lahir : </strong>{{ date('d M Y',strtotime($data->tanggal_lahir)) }}<br>
			<strong>Alamat : </strong>{{ $data->alamat }}<br>
			<strong>HP : </strong>{{ $data->hp }}<br>
			<strong>Identitas : </strong>{{ $data->no_identitas }}<br>
			<strong>ID PDAM : </strong>{{ $data->id_pdam }}<br><br>
			<a class="btn btn-primary btn-sm" href="{{ URL::to('anggota') }}">Go Back</a>
		</p>
	</div>
@stop