@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')

<h3>Nama PDAM : {{ $iuran->first()->peserta->pdam->nama_pdam }} <br>
Bulan Tahun : {{ $iuran->first()->bln_thn }}</h3>

<a class="btn btn-primary btn-sm" href="{{ URL::to('iurankolektif') }}">Back</a>
				
<br><br>

{{ HTML::ul($errors->all()) }}

<table class="table table-stripped table-bordered table-hover">
<thead>
	<tr><th>No.</th><th>ID Peserta</th><th>Peserta</th><th>Cicilan ke</th><th>Periode</th>
	<th>Iuran</th><th>Status</th><th>Action</th></tr>
</thead>
<tbody>
	@foreach($iuran as $key => $value)
		<tr>
			<td>{{ $no }}</td>
			<td>{{ $value->id_peserta }}</td>
			<td>{{ $value->peserta->nama_peserta }}</td>
			<td>{{ $value->cicilan_ke }}</td>
			<td>{{ $value->bln_thn }}</td>
			<td>{{ number_format($value->iuran,2,'.',',') }}</td>
			<td>{{ $value->status }}</td>
			<td>
				{{ Form::open(array('url'=>'iurankolektif/'.$value->id,'class'=>'pull-right')) }}
				{{ Form::hidden('_method','DELETE') }}
				{{ Form::submit('Payment',array('class'=>'btn btn-success btn-sm')) }}
				{{ Form::close() }}
			</td>
		</tr>
		<?php $no++; ?>
	@endforeach
</tbody>
</table>

@stop