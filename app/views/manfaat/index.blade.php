@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')

<h2>View All Manfaat</h2><br>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

<a class="btn btn-primary btn-sm" href="{{ URL::to('manfaat/create') }}">Create New</a><br><br>

<table class="table table-stripped table-bordered table-hover">
<thead>
	<tr><th>ID Paket</th><th>Nama Paket</th><th>Bulan</th><th>Manfaat</th><th>Santunan</th><th>Tambahan</th><th>Action</th></tr>
</thead>
<tbody>
	@foreach($manfaat as $key => $value)
		<tr>
			<td>{{ $value->id_paket }}</td>
			<td>{{ $value->paket->nama_paket }}</td>
			<td>{{ $value->bulan }}</td>
			<td>{{ number_format($value->manfaat,2,',','.') }}</td>
			<td>{{ number_format($value->santunan,2,',','.') }}</td>
			<td>{{ number_format($value->tambahan,2,',','.') }}</td>
			<td>
				{{ Form::open(array('url'=>'manfaat/'.$value->id,'class'=>'pull-right')) }}
				{{ Form::hidden('_method','DELETE') }}
				{{ Form::submit('Delete',array('class'=>'btn btn-warning btn-sm')) }}
				{{ Form::close() }}
				
				<a class="btn btn-success btn-sm" href="{{ URL::to('manfaat/'.$value->id) }}">Show</a>
				<a class="btn btn-info btn-sm" href="{{ URL::to('manfaat/'.$value->id.'/edit') }}">Edit</a>
			</td>
		</tr>
	@endforeach
</tbody>
</table>

{{ $manfaat->links() }}

@stop