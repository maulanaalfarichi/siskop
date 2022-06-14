@extends('layouts.trading')
@section('navbar')
@parent
@stop

@section('content')
<h2>Create the Sales</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'sales')) }}
<div class="form-group">
	{{ Form::label('nama_sales','Nama Sales') }}
	{{ Form::text('nama_sales',Input::old('nama_sales'),array('class'=>'form-control')) }}
</div>
{{ Form::submit('Create the Sales',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('sales') }}">Cancel</a>
{{ Form::close() }}

@stop