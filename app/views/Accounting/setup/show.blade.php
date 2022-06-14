@extends('layouts.accounting')
@section('navbar')
@parent
@stop

@section('content')
	<h2>#Showing {{ $setup->id_rekening }}</h2>
	<div class="row">
		<div class="col-md-6">
			<table class="table table-striped">
				<tbody>
					<tr><td>ID Rekening</td><td><strong>{{ $setup->id_rekening }}</strong></td></tr>
					<tr><td>Nama Rekening</td><td><strong>{{ $setup->nama_rekening }}</strong></td></tr>
					<tr><td>ID Klasifikasi</td><td><strong>{{ $setup->id_klasifikasi }}</strong></td></tr>
					<tr><td>Parent ID</td><td><strong>{{ $setup->parent_id }}</strong></td></tr>
					<tr><td>Normal Balance</td><td><strong>{{ $setup->normal_balance }}</strong></td></tr>
					<tr><td>Golongan</td><td><strong>{{ $setup->id_golongan }}</strong></td></tr>
					<tr><td>Debet</td><td><strong>{{ number_format($setup->saldo_awal_debet,2,'.',',') }}</strong></td></tr>
					<tr><td>Kredit</td><td><strong>{{ number_format($setup->saldo_awal_kredit,2,'.',',') }}</strong></td></tr>
				</tbody>
			</table>
			<a class="btn btn-primary btn-sm" href="{{ URL::to('setup') }}">Go Back</a>
		</div>
	</div>
@stop