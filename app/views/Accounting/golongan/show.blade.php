@extends('layouts.accounting')
@section('navbar')
@parent
@stop

@section('content')
	<h2>Showing # {{ $data->id }}</h2>
	<div class="row">
		<div class="col-md-6">
			<table class="table table-striped">
				<tbody>
					<tr><td>Nama Golongan</td><td><strong>{{ $data->nama_golongan }}</strong></td></tr>
				</tbody>
			</table>
			<a class="btn btn-primary btn-sm" href="{{ URL::to('golongan') }}">Go Back</a>
		</div>
	</div>
@stop