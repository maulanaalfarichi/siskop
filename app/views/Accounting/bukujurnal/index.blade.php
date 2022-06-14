@extends('layouts.accounting')
@section('navbar')
@parent
@stop

@section('content')
<h2>Buku Jurnal</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'bukujurnal')) }}
<div class="form-group">
	{{ Form::label('tgl_awal','DD-MM-YYYY') }}
	{{ Form::text('tgl_awal',Input::old('tgl_awal'),array('class'=>'form-control','placeholder'=>'DD-MM-YYYY')) }}
</div>
<div class="form-group">
	{{ Form::label('tgl_akhir','DD-MM-YYYY') }}
	{{ Form::text('tgl_akhir',Input::old('tgl_akhir'),array('class'=>'form-control','placeholder'=>'DD-MM-YYYY')) }}
</div>

{{ Form::submit('Preview',array('class'=>'btn btn-primary btn-sm')) }}
{{ Form::close() }}

@stop