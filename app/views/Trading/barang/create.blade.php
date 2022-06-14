@extends('layouts.trading')
@section('navbar')
@parent
@stop

@section('content')
<h2>Create the Barang</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'barang')) }}
<div class="form-group">
	{{ Form::label('id','ID Barang') }}
	{{ Form::text('id',Input::old('id'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('nama_barang','Nama Barang') }}
	{{ Form::text('nama_barang',Input::old('nama_barang'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('satuan','Satuan') }}
	{{ Form::text('satuan',Input::old('satuan'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('stok','Stok') }}
	{{ Form::text('stok',Input::old('stok'),array('class'=>'form-control')) }}
</div>
{{ Form::submit('Create the Barang',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('barang') }}">Cancel</a>
{{ Form::close() }}

@stop