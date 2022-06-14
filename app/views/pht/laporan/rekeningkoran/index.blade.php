@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
<h2>Laporan Rekening Koran</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'tampilrekeningkoran')) }}
<div class="form-group">
	{{ Form::label('bln_thn','MM-YYYY') }}
	{{ Form::text('bln_thn',Input::old('bln_thn'),array('class'=>'form-control','placeholder'=>'MM-YYYY')) }}
</div>

{{ Form::submit('Preview',array('class'=>'btn btn-primary btn-sm')) }}
{{ Form::close() }}

@stop