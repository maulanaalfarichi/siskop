@extends('layouts.accounting')
@section('navbar')
@parent
@stop

@section('content')
<div class="col-md-4">
<h2>Create Posting</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'posting')) }}
<div class="form-group">
	{{ Form::label('tanggal','Tanggal Transaksi') }}
	{{ Form::select('tanggal',$data,Input::old('tanggal'),array('class'=>'form-control')) }}
</div>
{{ Form::submit('Create the Posting',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('posting') }}">Cancel</a>
{{ Form::close() }}
</div>

@stop