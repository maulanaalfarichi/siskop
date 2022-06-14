@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')

	<div class="col-md-4">
		<Table class="table table-striped table-hover">
			<tr><td>ID Bank</td><td><strong>{{ $bank->id_bank }}</strong></td></tr>
			<tr><td>Nama Bank</td><td><strong>{{ $bank->nama_bank }}</strong></td></tr>
		</table><br>
		<a class="btn btn-primary btn-sm" href="{{ URL::to('bank') }}">Go Back</a>
	</div>
@stop