@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')

<h2>Edit the Sales</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::model($sales,array('route'=>array('sales.update',$sales->id),'method'=>'PUT')) }}
<div class="form-group">
	{{ Form::label('nama_sales','Nama Sales') }}
	{{ Form::text('nama_sales',Input::old('nama_sales'),array('class'=>'form-control')) }}
</div>
{{ Form::submit('Update the Sales',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('sales') }}">Cancel</a>
{{ Form::close() }}
@stop