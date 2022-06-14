@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')

<h2>Edit  the Division</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::model($divisi,array('route'=>array('division.update',$divisi->id),'method'=>'PUT')) }}
<div class="form-group">
	{{ Form::label('id','Division ID') }}
	{{ Form::text('id',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('division_name','Division Name') }}
	{{ Form::text('division_name',null,array('class'=>'form-control')) }}
</div>
{{ Form::submit('Update the division',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('division') }}">Cancel</a>
{{ Form::close() }}
@stop