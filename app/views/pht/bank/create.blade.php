@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
<div class="col-md-4">
<h2>Create the Bank</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'bank')) }}
<div class="form-group">
	{{ Form::label('id_bank','ID Bank') }}
	{{ Form::text('id_bank',Input::old('id_bank'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('nama_bank','Nama Bank') }}
	{{ Form::text('nama_bank',Input::old('nama_bank'),array('class'=>'form-control')) }}
</div>
{{ Form::submit('Create the Bank',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('bank') }}">Cancel</a>
{{ Form::close() }}

</div>
@stop