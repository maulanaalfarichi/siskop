@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
<h2>Create the Division</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'division')) }}
<div class="form-group">
	{{ Form::label('id','Division ID') }}
	{{ Form::text('id',Input::old('id'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('division_name','Division Name') }}
	{{ Form::text('division_name',Input::old('division_name'),array('class'=>'form-control')) }}
</div>
{{ Form::submit('Create the Division',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('division') }}">Cancel</a>
{{ Form::close() }}

@stop