@extends('layouts.accounting')
@section('navbar')
@parent
@stop

@section('content')
<div class="col-md-4">
<h2>Rugi Laba</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'rugilaba','target'=>'_blank')) }}
<div class="form-group">
	{{ Form::label('tanggal','Tanggal') }}
	{{ Form::text('tanggal',Input::old('tanggal'),array('class'=>'form-control','placeholder'=>'DD-MM-YYYY')) }}
</div>

{{ Form::submit('Preview',array('class'=>'btn btn-primary btn-sm')) }}
{{ Form::close() }}
</div>
@stop