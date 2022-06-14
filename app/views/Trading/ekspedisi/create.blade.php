@extends('layouts.trading')
@section('navbar')
@parent
@stop

@section('content')
<h2>Create the Ekspedisi</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'ekspedisi')) }}
<div class="form-group">
	{{ Form::label('nama','Nama Ekspedisi') }}
	{{ Form::text('nama',Input::old('nama'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('alamat','Alamat') }}
	{{ Form::text('alamat',Input::old('alamat'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('kota','Kota') }}
	{{ Form::text('kota',Input::old('kota'),array('class'=>'form-control')) }}
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
	{{ Form::label('daerah','Daerah') }}
	{{ Form::text('daerah',Input::old('daerah'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('email','Email') }}
	{{ Form::email('email',Input::old('email'),array('class'=>'form-control')) }}
</div>
{{ Form::submit('Create the Ekspedisi',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('ekspedisi') }}">Cancel</a>
{{ Form::close() }}

@stop