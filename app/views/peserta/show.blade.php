@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
	<h2>Showing {{ $peserta->id_peserta }}</h2>
	<div class="jumbotron text-center">
		<p>
			<strong>ID Peserta : </strong>{{ $peserta->id_peserta }}<br>
			<strong>Nama Peserta : </strong>{{ $peserta->nama_peserta }}<br>
			<strong>Tempat Lahir : </strong>{{ $peserta->tempat_lahir }}<br>
			<strong>Tanggal Lahir : </strong>{{ date('d M Y',strtotime($peserta->tanggal_lahir)) }}<br>
			<strong>Jenis Kelamin : </strong>{{ $peserta->jenis_kelamin }}<br>
			<strong>Alamat : </strong>{{ $peserta->alamat }}<br>
			<strong>Telpon : </strong>{{ $peserta->telpon }}<br>
			<strong>Handphone : </strong>{{ $peserta->handphone }}<br>
			<strong>Nama PDAM : </strong>{{ $peserta->pdam->nama_pdam }}<br>
			<strong>Paket PHT : </strong>{{ $peserta->paket->nama_paket }}<br>
			<strong>Tanggal Masuk : </strong>{{ date('d M Y',strtotime($peserta->tanggal_masuk)) }}<br>
			<strong>Tanggal Berhenti : </strong>{{ date('d M Y',strtotime($peserta->tanggal_berhenti)) }}<br>
			<strong>Tanggal Proses : </strong>{{ date('d M Y',strtotime($peserta->tanggal_proses)) }}<br>
			<strong>Nama Ahli Waris : </strong>{{ $peserta->nama_ahli_waris }}<br>
			<strong>Nama Bank : </strong>{{ $peserta->bank->nama_bank }}<br>
			<strong>Nomor Rekening : </strong>{{ $peserta->nomor_rekening }}<br>
			<strong>Atas Nama : </strong>{{ $peserta->atas_nama }}<br>
			<strong>Status : </strong>{{ $peserta->status->keterangan }}<br><br>
			<a class="btn btn-primary btn-sm" href="{{ URL::to('peserta') }}">Go Back</a>
		</p>
	</div>
@stop