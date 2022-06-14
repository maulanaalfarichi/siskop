@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')

<h2>Edit the Status</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::model($status,array('route'=>array('status.update',$status->id_status),'method'=>'PUT')) }}
<div class="form-group">
	{{ Form::label('id_status','ID Status') }}
	{{ Form::text('id_status',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('keterangan','Keterangan') }}
	{{ Form::text('keterangan',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('tarif','Tarif') }}
	{{ Form::text('tarif',null,array('class'=>'form-control')) }}
</div>
{{ Form::submit('Update the Status',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('status') }}">Cancel</a>
{{ Form::close() }}
@stop