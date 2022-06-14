@extends('layouts.trading')
@section('navbar')
@parent
@stop

@section('content')

<h2>View All Pelanggan</h2><br>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

<a class="btn btn-primary btn-sm" href="{{ URL::to('pelanggan/create') }}">Create New</a><br><br>

<table class="table table-stripped table-bordered table-hover">
<thead>
	<tr><th>ID</th><th>Nama Pelanggan</th><th>Alamat</th>
	<th>Contact</th><th>Telp</th><th>Fax</th><th>Action</th></tr>
</thead>
<tbody>
	@foreach($data as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->nama_pelanggan }}</td>
			<td>{{ $value->alamat }}</td>
			<td>{{ $value->contact }}</td>
			<td>{{ $value->telp }}</td>
			<td>{{ $value->fax }}</td>
			<td>
				{{ Form::open(array('url'=>'pelanggan/'.$value->id,'class'=>'pull-right')) }}
				{{ Form::hidden('_method','DELETE') }}
				{{ Form::submit('Delete',array('class'=>'btn btn-warning btn-sm')) }}
				{{ Form::close() }}
				
				<a class="btn btn-success btn-sm" href="{{ URL::to('pelanggan/'.$value->id) }}">Show</a>
				<a class="btn btn-info btn-sm" href="{{ URL::to('pelanggan/'.$value->id.'/edit') }}">Edit</a>
			</td>
		</tr>
	@endforeach
</tbody>
</table>

{{ $data->links() }}

@stop