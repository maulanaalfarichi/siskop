@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')

<h2>View All Bank</h2><br>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

<a class="btn btn-primary btn-sm" href="{{ URL::to('bank/create') }}">Create New</a><br><br>

<table class="table table-stripped table-bordered table-hover">
<thead>
	<tr><th>ID Bank</th><th>Nama Bank</th><th>Action</th></tr>
</thead>
<tbody>
	@foreach($bank as $key => $value)
		<tr>
			<td>{{ $value->id_bank }}</td>
			<td>{{ $value->nama_bank }}</td>
			<td>
				{{ Form::open(array('url'=>'bank/'.$value->id_bank,'class'=>'pull-right')) }}
				{{ Form::hidden('_method','DELETE') }}
				{{ Form::submit('Delete',array('class'=>'btn btn-warning btn-sm')) }}
				{{ Form::close() }}
				
				<a class="btn btn-success btn-sm" href="{{ URL::to('bank/'.$value->id_bank) }}">Show</a>
				<a class="btn btn-info btn-sm" href="{{ URL::to('bank/'.$value->id_bank.'/edit') }}">Edit</a>
			</td>
		</tr>
	@endforeach
</tbody>
</table>

{{ $bank->links() }}

@stop