@extends('layouts.usp')
@section('navbar')
@parent
@stop

@section('content')
	<h2>Showing {{ $data->id }}</h2>
	<div class="jumbotron text-center">
		<p>
			<strong>Tanggal Pinjam : </strong>{{ $data->tanggal_pinjam }}<br>
			<strong>ID Anggota : </strong>{{ $data->id_anggota }}<br>
			<strong>Pokok Pembiayaan : </strong>{{ number_format($data->pokok_pembiayaan,2,',','.') }}<br>
			<strong>Perkiraan Nisbah / Bagi hasil : </strong>{{ number_format($data->perkiraan_nisbah,2,',','.') }}<br>
			<strong>Maksimum Pembiayaan : </strong>{{ number_format($data->maksimum_pembiayaan,2,',','.') }}<br>
			<strong>Jangka Waktu : </strong>{{ $data->jangka_waktu }}<br>
			<strong>Keterangan : </strong>{{ $data->keterangan }}<br><br>
			<a class="btn btn-primary btn-sm" href="{{ URL::to('bayarpinjaman') }}">Go Back</a>
		</p>
	</div>
	<table class="table table-bordered table-hover table-striped">
	<thead>
		<tr>
			<th>Id</th><th>Cicilan ke</th>
			<th>Angsuran Pokok</th><th>Bagi Hasil</th>
			<th>Total Angsuran</th><th>Sisa Pembiayaan</th>
			<th>Tgl Bayar</th>
		</tr>
	</thead>
	<tbody>
	@foreach($detail as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->cicilan_ke }}</td>
			<td>{{ number_format($value->angsuran_pokok,2,',','.') }}</td>
			<td>{{ number_format($value->perkiraan_bagi_hasil,2,',','.') }}</td>
			<td>{{ number_format($value->total_angsuran,2,',','.') }}</td>
			<td>{{ number_format($value->sisa_pembiayaan,2,',','.') }}</td>
			<td>
				<?php 
					if($value->tanggal_bayar == '0000-00-00'){
				?>		
						<a class="btn btn-success btn-sm" href="{{ URL::to('bayarpinjaman/'.$value->id.'/edit') }}">Bayar</a>
				<?php
					}else{
				?>
						{{ date('d M Y',strtotime($value->tanggal_bayar)) }}
				<?php 
					}
				?>
			</td>
		</tr>
	@endforeach
	</tbody>	
	</table>
@stop