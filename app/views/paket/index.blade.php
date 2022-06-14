@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')

<h2>View All Paket</h2><br>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

<a class="btn btn-primary btn-sm" href="{{ URL::to('paket/create') }}">Create New</a><br><br>

<table class="table table-stripped table-bordered table-hover">
<thead>
	<tr><th>ID Paket</th><th>Nama Paket</th><th>Iuran</th><th>Premi</th><th>Operasional</th><th>Cadangan</th><th>Action</th></tr>
</thead>
<tbody>
	@foreach($paket as $key => $value)
		<tr>
			<td>{{ $value->id_paket }}</td>
			<td>{{ $value->nama_paket }}</td>
			<td>{{ number_format($value->iuran,2,',','.') }}</td>
			<td>{{ number_format($value->premi,2,',','.') }}</td>
			<td>{{ number_format($value->operasional,2,',','.') }}</td>
			<td>{{ number_format($value->cadangan,2,',','.') }}</td>
			<td>
				{{ Form::open(array('url'=>'paket/'.$value->id_paket,'class'=>'pull-right')) }}
				{{ Form::hidden('_method','DELETE') }}
				{{ Form::submit('Delete',array('class'=>'btn btn-warning btn-sm')) }}
				{{ Form::close() }}
				
				<a class="btn btn-danger btn-sm" href="{{ URL::route('manfaat.index') }}">Manfaat</a>
				<a class="btn btn-success btn-sm" href="{{ URL::to('paket/'.$value->id_paket) }}">Show</a>
				<a class="btn btn-info btn-sm" href="{{ URL::to('paket/'.$value->id_paket.'/edit') }}">Edit</a>
			</td>
		</tr>
	@endforeach
</tbody>
</table>

{{ $paket->links() }}

@stop