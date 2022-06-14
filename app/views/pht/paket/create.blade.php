@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
<div class="col-md-4">
<h2>Create the Paket</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'paket')) }}
<div class="form-group">
	{{ Form::label('id_paket','ID Paket') }}
	{{ Form::text('id_paket',Input::old('id_paket'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('nama_paket','Nama Paket') }}
	{{ Form::text('nama_paket',Input::old('nama_paket'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('iuran','Iuran') }}
	{{ Form::text('iuran',Input::old('iuran'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('premi','Premi') }}
	{{ Form::text('premi',Input::old('premi'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('operasional','Operasional') }}
	{{ Form::text('operasional',Input::old('operasional'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('cadangan','Cadangan') }}
	{{ Form::text('cadangan',Input::old('cadangan'),array('class'=>'form-control')) }}
</div>
{{ Form::submit('Create the Paket',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('paket') }}">Cancel</a>
{{ Form::close() }}
</div>

@stop