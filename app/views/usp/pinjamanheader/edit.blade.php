@extends('layouts.usp')
@section('navbar')
@parent
@stop

@section('content')

<h2>Edit the Jenis Simpanan</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::model($data,array('route'=>array('jenissimpanan.update',$data->id),'method'=>'PUT')) }}
<div class="form-group">
	{{ Form::label('jenis_simpanan','Jenis Simpanan') }}
	{{ Form::text('jenis_simpanan',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('jumlah','Jumlah') }}
	{{ Form::text('jumlah',null,array('class'=>'form-control')) }}
</div>
{{ Form::submit('Update the Jenis Simpanan',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('jenissimpanan') }}">Cancel</a>
{{ Form::close() }}
@stop