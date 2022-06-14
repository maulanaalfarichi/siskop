@extends('layouts.accounting')
@section('navbar')
@parent
@stop

@section('content')
<div class="col-md-4">

<h2>Edit the Jurnal Umum</h2>

{{ HTML::ul($errors->all()) }}

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

{{ Form::model($jurnal,array('route'=>array('jurnalumum.update',$jurnal->no_bukti),'method'=>'PUT')) }}
<div class="form-group">
	{{ Form::label('no_bukti','Nomor Bukti') }}
	{{ Form::text('no_buktix',$jurnal->no_bukti,array('class'=>'form-control','disabled')) }}
	{{ Form::hidden('no_bukti',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('tanggal','Tanggal') }}
	{{ Form::text('tanggal',null,array('class'=>'form-control','placeholder'=>'DD-MM-YYYY')) }}
</div>
<div class="form-group">
	{{ Form::label('keterangan','Keterangan') }}
	{{ Form::textarea('keterangan',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('jumlah','Jumlah') }}
	{{ Form::text('jumlah',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('id_rekening','Rekening') }}
	{{ Form::select('id_rekening',$rekening,null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('id_posisi','Posisi') }}
	{{ Form::select('id_posisi',$posisi,null,array('class'=>'form-control')) }}
</div>

{{ Form::submit('Update the Jurnal',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('jurnalumum') }}">Cancel</a>
{{ Form::close() }}


<?php 
	$debet = 0;
	$kredit = 0;
?>
<br><br><h2>Detail Journal</h2>
<table class="table table-stripped table-bordered table-hover">
<thead>
	<tr><th>ID Rekening</th><th>Nama Rekening</th><th>Debet</th><th>Kredit</th><th>Action</th></tr>
</thead>
<tbody>
@foreach($detail as $key => $value)
		<tr>
			<td>{{ $value->id_rekening }}</td>
			<td>{{ $value->accrekening->nama_rekening }}</td>
			<td>{{ number_format($value->debet,2,',','.') }}</td>
			<td>{{ number_format($value->kredit,2,',','.') }}</td>
			<td>
				{{ Form::open(array('url'=>'jurnaldetail/'.$value->id,'class'=>'pull-right')) }}
				{{ Form::hidden('_method','DELETE') }}
				{{ Form::submit('Delete',array('class'=>'btn btn-warning btn-sm')) }}
				{{ Form::close() }}
			</td>
		</tr>
		<?php 
			$debet = $debet + $value->debet;
			$kredit = $kredit + $value->kredit;
		?>
@endforeach
</tbody>
<tfooter>
		<tr>
			<td colspan="2">TOTAL</td>
			<td>{{ number_format($debet,2,',','.')  }}</td>
			<td>{{ number_format($kredit,2,',','.') }}</td>
			<td></td>
		</tr>
</tfooter>
</table>

</div>

@stop