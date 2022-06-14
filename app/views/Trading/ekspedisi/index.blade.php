@extends('layouts.trading')
@section('navbar')
@parent
@stop

@section('content')

<h2>View All Ekspedisi</h2><br>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" arial-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

<a class="btn btn-primary btn-sm" href="{{ URL::to('ekspedisi/create') }}">Create New</a><br><br>

<table class="table table-stripped table-bordered table-hover">
<thead>
	<tr><th>ID</th><th>Nama Ekspedisi</th><th>Alamat</th><th>Kota</th>
	<th>Contact</th><th>Telp</th><th>Daerah</th><th>Email</th>
	<th>Action</th></tr>
</thead>
<tbody>
	@foreach($ekspedisi as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->nama }}</td>
			<td>{{ $value->alamat }}</td>
			<td>{{ $value->kota }}</td>
			<td>{{ $value->contact }}</td>
			<td>{{ $value->telp }}</td>
			<td>{{ $value->daerah }}</td>
			<td>{{ $value->email }}</td>
			<td>
				{{ Form::open(array('url'=>'ekspedisi/'.$value->id,'class'=>'pull-right')) }}
				{{ Form::hidden('_method','DELETE') }}
				{{ Form::submit('Delete',array('class'=>'btn btn-warning btn-sm')) }}
				{{ Form::close() }}
				
				<a class="btn btn-success btn-sm" href="{{ URL::to('ekspedisi/'.$value->id) }}">Show</a>
				<a class="btn btn-info btn-sm" href="{{ URL::to('ekspedisi/'.$value->id.'/edit') }}">Edit</a>
			</td>
		</tr>
	@endforeach
</tbody>
</table>

{{ $ekspedisi->links() }}

@stop