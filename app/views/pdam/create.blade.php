@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
<h2>Create the PDAM</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'pdam')) }}
<div class="form-group">
	{{ Form::label('nama_pdam','Nama PDAM') }}
	{{ Form::text('nama_pdam',Input::old('nama_pdam'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('alamat','Alamat') }}
	{{ Form::text('alamat',Input::old('alamat'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('telepon','Telepon') }}
	{{ Form::text('telepon',Input::old('telepon'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('fax','Fax') }}
	{{ Form::text('fax',Input::old('fax'),array('class'=>'form-control')) }}
</div>
{{ Form::submit('Create the PDAM',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('pdam') }}">Cancel</a>
{{ Form::close() }}

@stop