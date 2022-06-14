@extends('layouts.usp')
@section('navbar')
@parent
@stop

@section('content')
	<h2>Showing {{ $data->id }}</h2>
	<div class="jumbotron text-center">
		<p>
			<strong>Nama Koperasi : </strong>{{ $data->nama_koperasi }}<br>
			<strong>Alamat : </strong>{{ $data->alamat }}<br>
			<strong>Telp : </strong>{{ $data->telp }}<br>
			<strong>Fax : </strong>{{ $data->fax }}<br>
			<strong>Pengurus 1 : </strong>{{ $data->pengurus1 }}<br>
			<strong>Pengurus 2 : </strong>{{ $data->pengurus2 }}<br>
			<strong>Pengurus 3 : </strong>{{ $data->pengurus3 }}<br>
			<strong>Pengawas : </strong>{{ $data->pengawas }}<br>
			<strong>Email : </strong>{{ $data->email }}<br>
			<strong>Simpanan Pokok : </strong>{{ number_format($data->simpanan_pokok,2,',','.') }}<br>
			<strong>Simpanan Wajib : </strong>{{ number_format($data->simpanan_wajib,2,',','.') }}<br><br>
			<a class="btn btn-primary btn-sm" href="{{ URL::to('anggota') }}">Go Back</a>
		</p>
	</div>
@stop