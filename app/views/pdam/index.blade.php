@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')

<h2>View All PDAM</h2><br>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

<a class="btn btn-primary btn-sm" href="{{ URL::to('pdam/create') }}">Create New</a><br><br>

<table class="table table-stripped table-bordered table-hover">
<thead>
	<tr><th>ID PDAM</th><th>Nama PDAM</th><th>Alamat</th><th>Action</th></tr>
</thead>
<tbody>
	@foreach($pdam as $key => $value)
		<tr>
			<td width="20">{{ $value->id_pdam }}</td>
			<td width="250">{{ $value->nama_pdam }}</td>
			<td width="300px">{{ $value->alamat }}</td>
			<td>
				{{ Form::open(array('url'=>'pdam/'.$value->id_pdam,'class'=>'pull-right')) }}
				{{ Form::hidden('_method','DELETE') }}
				{{ Form::submit('Delete',array('class'=>'btn btn-warning btn-sm')) }}
				{{ Form::close() }}
				
				<a class="btn btn-success btn-sm" href="{{ URL::to('pdam/'.$value->id_pdam) }}">Show</a>
				<a class="btn btn-info btn-sm" href="{{ URL::to('pdam/'.$value->id_pdam.'/edit') }}">Edit</a>
			</td>
		</tr>
	@endforeach
</tbody>
</table>

{{ $pdam->links() }}

@stop