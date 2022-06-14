@extends('layouts.trading')
@section('navbar')
@parent
@stop

@section('content')

<h2>View All Penjualan</h2><br>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

<a class="btn btn-primary btn-sm" href="{{ URL::to('penjualan/create') }}">Create New</a><br><br>

<table class="table table-stripped table-bordered table-hover">
<thead>
	<tr><th>ID</th><th>Tgl Penjualan</th><th>ID Pelanggan</th><th>ID Ekspedisi</th>
	<th>Jumlah</th><th>Diskon</th><th>Ongkos Kirim</th><th>Total</th><th>Action</th></tr>
</thead>
<tbody>
	@foreach($data as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ date('d M Y',strtotime($value->tanggal_penjualan)) }}</td>
			<td>{{ $value->id_pelanggan }}</td>
			<td>{{ $value->id_ekspedisi }}</td>
			<td>{{ number_format($value->jumlah,2,',','.') }}</td>
			<td>{{ number_format($value->diskon,2,',','.') }}</td>
			<td>{{ number_format($value->ongkos_kirim,2,',','.') }}</td>
			<td>{{ number_format($value->total,2,',','.') }}</td>
			<td>
				{{ Form::open(array('url'=>'penjualan/'.$value->id,'class'=>'pull-right')) }}
				{{ Form::hidden('_method','DELETE') }}
				{{ Form::submit('Delete',array('class'=>'btn btn-warning btn-sm')) }}
				{{ Form::close() }}
				
				<a class="btn btn-success btn-sm" href="{{ URL::to('penjualan/'.$value->id) }}">Detail</a>
				<a class="btn btn-info btn-sm" href="{{ URL::to('penjualan/'.$value->id.'/edit') }}">Edit</a>
			</td>
		</tr>
	@endforeach
</tbody>
</table>

{{ $data->links() }}

@stop