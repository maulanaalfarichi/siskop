@extends('layouts.trading')
@section('navbar')
@parent
@stop

@section('content')
<h2>Create the Adjustment</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'adjustment')) }}
<div class="form-group">
	{{ Form::label('id_barang','ID Barang') }}
	{{ Form::text('id_barang',Input::old('id_barang'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('jenis_adjust','Jenis Adjust') }}
	{{ Form::select('jenis_adjust',array('+'=>'+','-'=>'-'),Input::old('jenis_adjust'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('jml_adjust','Jumlah Adjustment') }}
	{{ Form::text('jml_adjust',Input::old('jml_adjust'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('keterangan','Keterangan') }}
	{{ Form::text('keterangan',Input::old('keterangan'),array('class'=>'form-control')) }}
</div>
{{ Form::submit('Create the Adjustment',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('adjustment') }}">Cancel</a>
{{ Form::close() }}

@stop