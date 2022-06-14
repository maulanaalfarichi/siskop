@extends('layouts.usp')
@section('navbar')
@parent
@stop

@section('content')

<h2>View All Jenis Pengambilan</h2><br>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

<a class="btn btn-primary btn-sm" href="{{ URL::to('pengambilan/create') }}">Create New</a><br><br>

<table class="table table-stripped table-bordered table-hover">
<thead>
	<tr><th>ID Ambil</th><th>Tanggal Ambil</th><th>Id Anggota</th>
	<th>Jumlah</th><th>Action</th></tr>
</thead>
<tbody>
	@foreach($data as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ date('d M Y',strtotime($value->tanggal_ambil)) }}</td>
			<td>{{ $value->id_anggota }}</td>
			<td>{{ number_format($value->jumlah,2,',','.') }}</td>
			<td>
				{{ Form::open(array('url'=>'pengambilan/'.$value->id,'class'=>'pull-right')) }}
				{{ Form::hidden('_method','DELETE') }}
				{{ Form::submit('Delete',array('class'=>'btn btn-warning btn-sm')) }}
				{{ Form::close() }}
				
				<a class="btn btn-success btn-sm" href="{{ URL::to('pengambilan/'.$value->id) }}">Show</a>
				<a class="btn btn-info btn-sm" href="{{ URL::to('pengambilan/'.$value->id.'/edit') }}">Edit</a>
			</td>
		</tr>
	@endforeach
</tbody>
</table>

{{ $data->links() }}

@stop