@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')

<h2>View All Peserta</h2><br>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

<a class="btn btn-primary btn-sm" href="{{ URL::to('peserta/create') }}">Create New</a><br><br>

<table class="table table-stripped table-bordered table-hover">
<thead>
	<tr><th>ID Peserta</th><th>Nama Peserta</th><th>Paket</th><th>Tgl Lahir</th><th>Nama PDAM</th><th>Status</th><th>Action</th></tr>
</thead>
<tbody>
	@foreach($peserta as $key => $value)
		<tr>
			<td>{{ $value->id_peserta }}</td>
			<td>{{ $value->nama_peserta }}</td>
			<td>{{ $value->paket->nama_paket }}</td>
			<td>{{ date('d M Y',strtotime($value->tanggal_lahir)) }}</td>
			<td>{{ $value->pdam->nama_pdam }}</td>
			<td>{{ $value->status->keterangan }}</td>
			<td>
				{{ Form::open(array('url'=>'peserta/'.$value->id_peserta,'class'=>'pull-right')) }}
				{{ Form::hidden('_method','DELETE') }}
				{{ Form::submit('Delete',array('class'=>'btn btn-warning btn-sm')) }}
				{{ Form::close() }}
				
				<a class="btn btn-success btn-sm" href="{{ URL::to('peserta/'.$value->id_peserta) }}">Show</a>
				<a class="btn btn-info btn-sm" href="{{ URL::to('peserta/'.$value->id_peserta.'/edit') }}">Edit</a>
			</td>
		</tr>
	@endforeach
</tbody>
</table>

{{ $peserta->links() }}

@stop