@extends('layouts.usp')
@section('navbar')
@parent
@stop

@section('content')

<h2>View All Pinjaman</h2><br>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

<a class="btn btn-primary btn-sm" href="{{ URL::to('pinjamanheader/create') }}">Create New</a><br><br>

<table class="table table-stripped table-bordered table-hover">
<thead>
	<tr><th>ID</th><th>Tanggal Pinjam</th><th>Id Anggota</th>
	<th>Pokok Pembiayaan</th><th>Pokok Nisbah</th>
	<th>Maksimum Pembiayaan</th><th>Jangka Waktu</th>
	<th>Keterangan</th><th>Action</th></tr>
</thead>
<tbody>
	@foreach($data as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->tanggal_pinjam }}</td>
			<td>{{ $value->id_anggota }}</td>
			<td>{{ number_format($value->pokok_pembiayaan,2,',','.') }}</td>
			<td>{{ number_format($value->perkiraan_nisbah,2,',','.') }}</td>
			<td>{{ number_format($value->maksimum_pembiayaan,2,',','.') }}</td>
			<td>{{ $value->jangka_waktu }}</td>
			<td>{{ $value->keterangan }}</td>
			<td>
				{{ Form::open(array('url'=>'pinjamanheader/'.$value->id,'class'=>'pull-right')) }}
				{{ Form::hidden('_method','DELETE') }}
				{{ Form::submit('Delete',array('class'=>'btn btn-warning btn-sm')) }}
				{{ Form::close() }}
				
				<a class="btn btn-success btn-sm" href="{{ URL::to('pinjamanheader/'.$value->id) }}">Show</a>
			</td>
		</tr>
	@endforeach
</tbody>
</table>

{{ $data->links() }}

@stop