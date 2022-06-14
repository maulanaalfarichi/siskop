@extends('layouts.trading')
@section('navbar')
@parent
@stop

@section('content')

<h2>View All Sales</h2><br>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

<a class="btn btn-primary btn-sm" href="{{ URL::to('sales/create') }}">Create New</a><br><br>

<table class="table table-stripped table-bordered table-hover">
<thead>
	<tr><th>ID Sales</th><th>Nama Sales</th><th>Action</th></tr>
</thead>
<tbody>
	@foreach($sales as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->nama_sales }}</td>
			<td>
				{{ Form::open(array('url'=>'sales/'.$value->id,'class'=>'pull-right')) }}
				{{ Form::hidden('_method','DELETE') }}
				{{ Form::submit('Delete',array('class'=>'btn btn-warning btn-sm')) }}
				{{ Form::close() }}
				
				<a class="btn btn-success btn-sm" href="{{ URL::to('sales/'.$value->id) }}">Show</a>
				<a class="btn btn-info btn-sm" href="{{ URL::to('sales/'.$value->id.'/edit') }}">Edit</a>
			</td>
		</tr>
	@endforeach
</tbody>
</table>

{{ $sales->links() }}

@stop