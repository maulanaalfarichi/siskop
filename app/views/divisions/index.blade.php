@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')

<h2>View All Division</h2><br>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

<a class="btn btn-primary btn-sm" href="{{ URL::to('division/create') }}">Create New</a><br><br>

<table class="table table-stripped table-bordered table-hover">
<thead>
	<tr><th>Division ID</th><th>Division Name</th><th>Action</th></tr>
</thead>
<tbody>
	@foreach($divisi as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->division_name }}</td>
			<td>
				{{ Form::open(array('url'=>'division/'.$value->id,'class'=>'pull-right')) }}
				{{ Form::hidden('_method','DELETE') }}
				{{ Form::submit('Delete',array('class'=>'btn btn-warning btn-sm')) }}
				{{ Form::close() }}
				
				<a class="btn btn-success btn-sm" href="{{ URL::to('division/'.$value->id) }}">Show</a>
				<a class="btn btn-info btn-sm" href="{{ URL::to('division/'.$value->id.'/edit') }}">Edit</a>
			</td>
		</tr>
	@endforeach
</tbody>
</table>

{{ $divisi->links() }}

@stop