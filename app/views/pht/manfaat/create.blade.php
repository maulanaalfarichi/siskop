@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
<div class="col-md-4">
<h2>Create the Manfaat</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'manfaat')) }}
<div class="form-group">
	{{ Form::label('id_paket','ID Paket') }}
	{{ Form::select('id_paket',array('Pilih Paket PHT'=>$paket),Input::old('id_paket'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('bulan','Bulan Ke-') }}
	{{ Form::text('bulan',Input::old('bulan'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('manfaat','Manfaat') }}
	{{ Form::text('manfaat',Input::old('manfaat'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('santunan','Santunan') }}
	{{ Form::text('santunan',Input::old('santunan'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('tambahan','Tambahan') }}
	{{ Form::text('tambahan',Input::old('tambahan'),array('class'=>'form-control')) }}
</div>
{{ Form::submit('Create the Manfaat',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('manfaat') }}">Cancel</a>
{{ Form::close() }}
</div>

@stop