@extends('layouts.trading')
@section('navbar')
@parent
@stop

@section('content')
<h2>Create the Penjualan Detail</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'penjualandetail')) }}
<div class="form-group">
	{{ Form::hidden('id_penjualan',$id,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('id_barang','ID Barang') }}
	{{ Form::select('id_barang',$barang,Input::old('id_barang'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('qty','Quantity') }}
	{{ Form::text('qty',Input::old('qty'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('harga','Harga') }}
	{{ Form::text('harga',Input::old('harga'),array('class'=>'form-control')) }}
</div>

{{ Form::submit('Create the Penjualan Detail',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('penjualandetail') }}">Cancel</a>
{{ Form::close() }}

@stop