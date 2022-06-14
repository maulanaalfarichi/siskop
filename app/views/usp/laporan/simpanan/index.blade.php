@extends('layouts.usp')
@section('navbar')
@parent
@stop

@section('content')
<h2>Laporan Simpanan</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'lapsimpanan')) }}
<div class="form-group">
	{{ Form::label('tanggal_simpanan','Tanggal Simpanan') }}
	{{ Form::text('tanggal_simpanan',Input::old('tanggal_simpanan'),array('class'=>'form-control','placeholder'=>'DD-MM-YYYY')) }}
</div>

{{ Form::submit('Preview',array('class'=>'btn btn-primary btn-sm')) }}
{{ Form::close() }}

@stop