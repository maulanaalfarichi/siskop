@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')

<h2>View All Status</h2><br>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

<a class="btn btn-primary btn-sm" href="{{ URL::to('status/create') }}">Create New</a><br><br>

<table class="table table-stripped table-bordered table-hover">
<thead>
	<tr><th>ID Status</th><th>Keterangan</th><th>Tarif</th><th>Action</th></tr>
</thead>
<tbody>
	@foreach($status as $key => $value)
		<tr>
			<td>{{ $value->id_status }}</td>
			<td>{{ $value->keterangan }}</td>
			<td>{{ $value->tarif." %" }}</td>
			<td>
				{{ Form::open(array('url'=>'status/'.$value->id_status,'class'=>'pull-right')) }}
				{{ Form::hidden('_method','DELETE') }}
				{{ Form::submit('Delete',array('class'=>'btn btn-warning btn-sm')) }}
				{{ Form::close() }}
				
				<a class="btn btn-success btn-sm" href="{{ URL::to('status/'.$value->id_status) }}">Show</a>
				<a class="btn btn-info btn-sm" href="{{ URL::to('status/'.$value->id_status.'/edit') }}">Edit</a>
			</td>
		</tr>
	@endforeach
</tbody>
</table>

{{ $status->links() }}

@stop