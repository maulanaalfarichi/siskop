@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')

<h2>Edit the Paket</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::model($paket,array('route'=>array('paket.update',$paket->id_paket),'method'=>'PUT')) }}
<div class="form-group">
	{{ Form::label('id_paket','ID Paket') }}
	{{ Form::text('id_paket',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('nama_paket','Nama Paket') }}
	{{ Form::text('nama_paket',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('iuran','Iuran') }}
	{{ Form::text('iuran',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('premi','Premi') }}
	{{ Form::text('premi',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('operasional','Operasional') }}
	{{ Form::text('operasional',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('cadangan','Cadangan') }}
	{{ Form::text('cadangan',null,array('class'=>'form-control')) }}
</div>
{{ Form::submit('Update the Paket',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('paket') }}">Cancel</a>
{{ Form::close() }}
@stop