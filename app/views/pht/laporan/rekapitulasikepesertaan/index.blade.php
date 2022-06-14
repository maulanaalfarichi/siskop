@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
<h2>Rekapitulasi Kepersertaan</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'tampilrekapitulasikepesertaan')) }}
<div class="form-group">
	{{ Form::label('tanggal','Input Month of Year :') }}
	{{ Form::text('tanggal',Input::old('tanggal'),array('class'=>'form-control','placeholder'=>'MM-YYYY')) }}
</div>

{{ Form::submit('Preview',array('class'=>'btn btn-primary btn-sm')) }}
{{ Form::close() }}

@stop