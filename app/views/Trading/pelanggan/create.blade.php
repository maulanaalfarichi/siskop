@extends('layouts.trading')
@section('navbar')
@parent
@stop

@section('content')
<h2>Create the Pelanggan</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'pelanggan')) }}
<div class="form-group">
	{{ Form::label('nama_pelanggan','Nama Pelanggan') }}
	{{ Form::text('nama_pelanggan',Input::old('nama_pelanggan'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('alamat','Alamat') }}
	{{ Form::text('alamat',Input::old('alamat'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('contact','Contact') }}
	{{ Form::text('contact',Input::old('contact'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('telp','Telpon') }}
	{{ Form::text('telp',Input::old('telp'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('fax','Fax') }}
	{{ Form::text('fax',Input::old('fax'),array('class'=>'form-control')) }}
</div>
{{ Form::submit('Create the Pelanggan',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('pelanggan') }}">Cancel</a>
{{ Form::close() }}

@stop