@extends('layouts.accounting')
@section('navbar')
@parent
@stop

@section('content')

<h2>View All Jurnal Kas Keluar</h2><br>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

<a class="btn btn-primary btn-sm" href="{{ URL::to('jurnalkas/create') }}">Create New</a><br><br>

<table class="table table-stripped table-bordered table-hover">
<thead>
	<tr><th>No Bukti</th><th>Tanggal</th><th>Keterangan</th><th>Total Debet</th>
	<th>Total Kredit</th><th>Action</th></tr>
</thead>
<tbody>
	@foreach($data as $key => $value)
		<tr>
			<td>{{ $value->no_bukti }}</td>
			<td>{{ date('d M Y',strtotime($value->tanggal)) }}</td>
			<td>{{ $value->keterangan }}</td>
			<td>{{ number_format($value->debet,2,',','.') }}</td>
			<td>{{ number_format($value->kredit,2,',','.') }}</td>
			<td>
				{{ Form::open(array('url'=>'jurnalumum/'.$value->no_bukti,'class'=>'pull-right')) }}
				{{ Form::hidden('_method','DELETE') }}
				{{ Form::submit('Delete',array('class'=>'btn btn-warning btn-sm')) }}
				{{ Form::close() }}
				
				<a class="btn btn-success btn-sm" href="{{ URL::to('jurnalkas/'.$value->no_bukti) }}">Show</a>
				<a class="btn btn-info btn-sm" href="{{ URL::to('jurnalkas/'.$value->no_bukti.'/edit') }}">Edit</a>
			</td>
		</tr>
	@endforeach
</tbody>
</table>

{{ $data->links() }}

@stop