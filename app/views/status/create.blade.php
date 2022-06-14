@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
<h2>Create the Status</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'status')) }}
<div class="form-group">
	{{ Form::label('id_status','ID Status') }}
	{{ Form::text('id_status',Input::old('id_status'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('keterangan','Keterangan') }}
	{{ Form::text('keterangan',Input::old('keterangan'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('tarif','Tarif') }}
	{{ Form::text('tarif',Input::old('tarif'),array('class'=>'form-control')) }}
</div>
{{ Form::submit('Create the Status',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('status') }}">Cancel</a>
{{ Form::close() }}

@stop