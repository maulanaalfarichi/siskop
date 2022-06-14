@extends('layouts.usp')
@section('navbar')
@parent
@stop

@section('content')
<h2>Create the Simpanan</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'simpanan')) }}
<div class="form-group">
	{{ Form::label('id_anggota','ID Anggota') }}
	{{ Form::text('id_anggota',Input::old('id_anggota'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('id_jenis','ID Jenis') }}
	{{ Form::select('id_jenis',$data,Input::old('id_jenis'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('jumlah','Jumlah') }}
	{{ Form::text('jumlah',Input::old('jumlah'),array('class'=>'form-control')) }}
</div>
{{ Form::submit('Create the Simpanan',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('simpanan') }}">Cancel</a>
{{ Form::close() }}

@stop