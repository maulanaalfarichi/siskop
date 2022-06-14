@extends('layouts.trading')
@section('navbar')
@parent
@stop

@section('content')

<h2>Edit the Barang</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::model($data,array('route'=>array('barang.update',$data->id),'method'=>'PUT')) }}
<div class="form-group">
	{{ Form::label('id','ID Barang') }}
	{{ Form::text('id',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('nama_barang','Nama Barang') }}
	{{ Form::text('nama_barang',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('satuan','Satuan') }}
	{{ Form::text('satuan',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('stok','Stok') }}
	{{ Form::text('stok',null,array('class'=>'form-control')) }}
</div>
{{ Form::submit('Edit the Barang',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('barang') }}">Cancel</a>
{{ Form::close() }}
@stop