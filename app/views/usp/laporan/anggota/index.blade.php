@extends('layouts.usp')
@section('navbar')
@parent
@stop

@section('content')
<h2>Laporan Anggota</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'lapanggota')) }}
<div class="form-group">
	{{ Form::label('id_pdam','ID PDAM') }}
	{{ Form::select('id_pdam',$data,Input::old('id_pdam'),array('class'=>'form-control')) }}
</div>

{{ Form::submit('Preview',array('class'=>'btn btn-primary btn-sm')) }}
{{ Form::close() }}

@stop