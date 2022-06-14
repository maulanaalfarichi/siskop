@extends('layouts.accounting')
@section('navbar')
@parent
@stop

@section('content')
<div class="col-md-4">

<h2>Edit the Golongan</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::model($data,array('route'=>array('golongan.update',$data->id),'method'=>'PUT')) }}
<div class="form-group">
	{{ Form::label('nama_golongan','Nama Golongan') }}
	{{ Form::text('nama_golongan',null,array('class'=>'form-control')) }}
</div>
{{ Form::submit('Update the Golongan',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('golongan') }}">Cancel</a>
{{ Form::close() }}
</div>
@stop