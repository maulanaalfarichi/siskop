@extends('layouts.trading')
@section('navbar')
@parent
@stop

@section('content')
<h2>Create the Supplier</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'supplier')) }}
<div class="form-group">
	{{ Form::label('nama_supplier','Nama Supplier') }}
	{{ Form::text('nama_supplier',Input::old('nama_supplier'),array('class'=>'form-control')) }}
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
	{{ Form::label('product','Product') }}
	{{ Form::text('product',Input::old('product'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('email','Email') }}
	{{ Form::email('email',Input::old('email'),array('class'=>'form-control')) }}
</div>
{{ Form::submit('Create the Supplier',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('supplier') }}">Cancel</a>
{{ Form::close() }}

@stop