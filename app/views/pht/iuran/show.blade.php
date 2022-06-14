@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
	<div class="col-md-4">
		<table class="table table-striped table-hover">
			<tr><td>ID Peserta</td><td><strong>{{ $iuran->id_peserta }}</strong></td></tr>
			<tr><td>Cicilan Ke-</td><td><strong>{{ $iuran->cicilan_ke }}</strong></td></tr>
			<tr><td>Iuran</td><td><strong>{{ number_format($iuran->iuran,2,'.',',') }}</strong></td></tr>
			<tr><td>Tanggal Bayar</td><td><strong>{{ date('d M Y',strtotime($iuran->tanggal_bayar)) }}</strong></td></tr>
			<tr><td>ID Bank</td><td><strong>{{ $iuran->id_bank }}</strong></td></tr>
			<tr><td>Status</td><td><strong>{{ $iuran->status }}</strong></td></tr>
			<tr><td>Keterangan</td><td><strong>{{ $iuran->keterangan }}</strong></td></tr>
			<tr><td>Created At</td><td><strong>{{ date('d M Y',strtotime($iuran->created_at)) }}</strong></td></tr>
			<tr><td>Updated At</td><td><strong>{{ date('d M Y',strtotime($iuran->updated_at)) }}</strong></td></tr>
		</table><br>
		<a class="btn btn-primary btn-sm" href="{{ URL::to('iuran') }}">Go Back</a>
		</p>
	</div>
@stop