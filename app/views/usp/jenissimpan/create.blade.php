@extends('layouts.usp')
@section('navbar')
@parent
@stop

@section('content')
<h2>Create the Jenis Simpanan</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'jenissimpanan')) }}
<div class="form-group">
	{{ Form::label('jenis_simpanan','Jenis Simpanan') }}
	{{ Form::text('jenis_simpanan',Input::old('jenis_simpanan'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('jumlah','Jumlah') }}
	{{ Form::text('jumlah',Input::old('jumlah'),array('class'=>'form-control')) }}
</div>
{{ Form::submit('Create the Jenis Simpanan',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('jenissimpanan') }}">Cancel</a>
{{ Form::close() }}

@stop