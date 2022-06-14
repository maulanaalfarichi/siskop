@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
<h2>Laporan Tunggakan</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'tampillaporantunggakan')) }}
<div class="form-group">
	{{ Form::label('id_pdam','Nama PDAM') }}
	{{ Form::select('id_pdam',$pdam,Input::old('id_pdam'),array('class'=>'form-control','placeholder'=>'MM-YYYY')) }}
</div>
<div class="form-group">
	{{ Form::label('bln_thn','MM-YYYY') }}
	{{ Form::text('bln_thn',Input::old('bln_thn'),array('class'=>'form-control','placeholder'=>'MM-YYYY')) }}
</div>

{{ Form::submit('Preview',array('class'=>'btn btn-primary btn-sm')) }}
{{ Form::close() }}

@stop