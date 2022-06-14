@extends('layouts.accounting')
@section('navbar')
@parent
@stop

@section('content')
<div class="col-md-4">
<h2>Create the Jurnal Umum</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'jurnalumum')) }}
<div class="form-group">
	{{ Form::label('no_bukti','Nomor Bukti') }}
	{{ Form::text('no_bukti',Input::old('no_bukti'),array('class'=>'form-control','disabled')) }}
</div>
<div class="form-group">
	{{ Form::label('tanggal','Tanggal') }}
	{{ Form::text('tanggal',Input::old('tanggal'),array('class'=>'form-control','placeholder'=>'DD-MM-YYYY')) }}
</div>
<div class="form-group">
	{{ Form::label('keterangan','Keterangan') }}
	{{ Form::textarea('keterangan',Input::old('keterangan'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('jumlah','Jumlah') }}
	{{ Form::text('jumlah',Input::old('jumlah'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('id_rekening','Rekening') }}
	{{ Form::select('id_rekening',$rekening,Input::old('id_rekening'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('id_posisi','Posisi') }}
	{{ Form::select('id_posisi',$posisi,Input::old('id_posisi'),array('class'=>'form-control')) }}
</div>
{{ Form::submit('Create the Journal',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('jurnalumum') }}">Cancel</a>
{{ Form::close() }}
</div>
@stop