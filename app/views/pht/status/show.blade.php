@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
	<div class="col-md-4">
		<table class="table table-striped table-hover">
			<tr><td>ID Status</TD><td><strong>{{ $status->id_status }}</strong></td></tr>
			<tr><td>Keterangan</TD><td><strong>{{ $status->keterangan }}</strong></td></tr>
			<tr><td>Tarif</TD><td><strong>{{ $status->tarif }}</strong></td></tr>
		</table><br>
		<a class="btn btn-primary btn-sm" href="{{ URL::to('status') }}">Go Back</a>
	</div>
@stop