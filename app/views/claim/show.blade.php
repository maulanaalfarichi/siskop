@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
	<h2>Showing {{ $claim->id_claim }}</h2>
	<div class="jumbotron text-center">
		<p>
			<strong>ID Claim : </strong>{{ $claim->id_claim }}<br>
			<strong>Nama Lengkap : </strong>{{ $claim->nama_lengkap }}<br>
			<strong>Tempat Lahir : </strong>{{ $claim->tempat_lahir }}<br>
			<strong>Tanggal Lahir : </strong>{{ date('d M Y',strtotime($claim->tanggal_lahir)) }}<br>
			<strong>Alamat Rumah : </strong>{{ $claim->alamat_rumah }}<br>
			<strong>Hubungan : </strong>{{ $claim->hubungan }}<br>
			<strong>Jenis Pengajuan : </strong>{{ $claim->jenis_pengajuan }}<br>
			<strong>ID Peserta : </strong>{{ $claim->peserta->id_peserta }}<br>
			<strong>Nama Peserta : </strong>{{ $claim->peserta->nama_peserta }}<br>
			<strong>Status : </strong>{{ $claim->status->keterangan }}<br>
			<strong>Keterangan : </strong>{{ $claim->keterangan }}<br>
			<strong>Bank : </strong>{{ $claim->bank->nama_bank }}<br>
			<strong>Cabang : </strong>{{ $claim->cabang }}<br>
			<strong>Nama Rekening : </strong>{{ $claim->nama_rekening }}<br>
			<strong>Nomor Rekening : </strong>{{ $claim->no_rekening }}<br><br>
			<a class="btn btn-primary btn-sm" href="{{ URL::to('claim') }}">Go Back</a>
		</p>
	</div>
@stop