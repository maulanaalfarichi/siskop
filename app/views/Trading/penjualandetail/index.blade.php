@extends('layouts.trading')
@section('navbar')
@parent
@stop

@section('content')

<h2>Order #{{ $penjualan->id }}</h2>

<table >
<tr><td>Tgl Penjualan</td><td>:</td><td>{{ date('d M Y',strtotime($penjualan->tanggal_penjualan)) }}</td></tr>
<tr><td>ID Pelanggan</td><td>:</td><td>{{ $penjualan->pelanggan()->first()->nama_pelanggan }}</td></tr>
<tr><td>ID Ekspedisi</td><td>:</td><td>{{ $penjualan->ekspedisi()->first()->nama }}</td></tr>
</table><br>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

<a class="btn btn-primary btn-sm" href="{{ URL::to('penjualandetail/'.$penjualan->id) }}">Create New</a>
<a class="btn btn-primary btn-sm" href="{{ URL::to('penjualan') }}">Penjualan</a><br><br>

<table class="table table-stripped table-bordered table-hover">
<thead>
	<tr><th>ID Barang</th><th>Qty</th><th>Satuan</th><th>Harga</th>
	<th>Jumlah</th><th>Action</th></tr>
</thead>
<tbody>
	@foreach($data as $key => $value)
		<tr>
			<td>{{ $value->id_barang }}</td>
			<td>{{ number_format($value->qty,2,',','.') }}</td>
			<td>{{ $value->satuan }}</td>
			<td>{{ number_format($value->harga,2,',','.') }}</td>
			<td>{{ number_format($value->jumlah,2,',','.') }}</td>
			<td>
				{{ Form::open(array('url'=>'penjualandetail/'.$value->id,'class'=>'pull-right')) }}
				{{ Form::hidden('_method','DELETE') }}
				{{ Form::submit('Delete',array('class'=>'btn btn-warning btn-sm')) }}
				{{ Form::close() }}
			</td>
		</tr>
	@endforeach
	    <tr>
			<td colspan="4">Jumlah</td>
			<td>{{ number_format($penjualan->jumlah,2,',','.') }}</td><td></td>
		</tr>
		<tr>
			<td colspan="4">Diskon ( % )</td>
			<td>{{ number_format($penjualan->diskon,2,',','.') }}</td><td></td>
		</tr>
		<tr>
			<td colspan="4">PPN ( % )</td>
			<td>{{ number_format($penjualan->ppn,2,',','.') }}</td><td></td>
		</tr>
		<tr>
			<td colspan="4">Ongkos Kirim</td>
			<td>{{ number_format($penjualan->ongkos_kirim,2,',','.') }}</td><td></td>
		</tr>
		<tr>
			<td colspan="4">Total</td>
			<td>{{ number_format($penjualan->total,2,',','.') }}</td><td></td>
		</tr>
</tbody>	
</table>


@stop