@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')

<h2>View All Claim</h2><br>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

<a class="btn btn-primary btn-sm" href="{{ URL::to('claim/create') }}">Create New</a><br><br>

<table class="table table-stripped table-bordered table-hover">
<thead>
	<tr><th>ID Claim</th><th>Nama Lengkap</th><th>Hubungan</th><th>ID Peserta</th><th>ID Status</th><th>Action</th></tr>
</thead>
<tbody>
	@foreach($claim as $key => $value)
		<tr>
			<td>{{ $value->id_claim }}</td>
			<td>{{ $value->nama_lengkap }}</td>
			<td>{{ $value->hubungan }}</td>
			<td>{{ $value->peserta->nama_peserta }}</td>
			<td>{{ $value->status->keterangan }}</td>
			<td>
				{{ Form::open(array('url'=>'claim/'.$value->id_claim,'class'=>'pull-right')) }}
				{{ Form::hidden('_method','DELETE') }}
				{{ Form::submit('Delete',array('class'=>'btn btn-warning btn-sm')) }}
				{{ Form::close() }}
				
				<a class="btn btn-success btn-sm" href="{{ URL::to('claim/'.$value->id_claim) }}">Show</a>
				<a class="btn btn-info btn-sm" href="{{ URL::to('claim/'.$value->id_claim.'/edit') }}">Edit</a>
			</td>
		</tr>
	@endforeach
</tbody>
</table>

{{ $claim->links() }}

@stop