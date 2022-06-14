@extends('layouts.trading')
@section('navbar')
@parent
@stop

@section('content')

<h2>View All Adjustment</h2><br>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

<a class="btn btn-primary btn-sm" href="{{ URL::to('adjustment/create') }}">Create New</a><br><br>

<table class="table table-stripped table-bordered table-hover">
<thead>
	<tr><th>ID</th><th>Tgl Adjust</th><th>ID Barang</th>
	<th>Nama Barang</th><th>+/-</th><th>Jml Adjust</th><th>Ket.</th><th>Action</th></tr>
</thead>
<tbody>
	@foreach($data as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ date('d M Y',strtotime($value->tanggal_adjust)) }}</td>
			<td>{{ $value->id_barang }}</td>
			<td>{{ $value->barang->nama_barang }}</td>
			<td>{{ $value->jenis_adjust }}</td>
			<td>{{ $value->jml_adjust }}</td>
			<td>{{ $value->keterangan }}</td>
			<td>
				{{ Form::open(array('url'=>'adjustment/'.$value->id,'class'=>'pull-right')) }}
				{{ Form::hidden('_method','DELETE') }}
				{{ Form::submit('Delete',array('class'=>'btn btn-warning btn-sm')) }}
				{{ Form::close() }}
				
				<a class="btn btn-success btn-sm" href="{{ URL::to('adjustment/'.$value->id) }}">Show</a>
			</td>
		</tr>
	@endforeach
</tbody>
</table>

{{ $data->links() }}

@stop