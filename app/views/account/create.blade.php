@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
<h2>Create the Account</h2>

{{ HTML::ul($errors->all()) }}


{{ Form::open(array('url'=>'account')) }}
<div class="form-group">
	{{ Form::label('id','Account ID') }}
	{{ Form::text('id',Input::old('id'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('account_name','Account Name') }}
	{{ Form::text('account_name',Input::old('account_name'),array('class'=>'form-control')) }}
</div>
{{ Form::submit('Create the Account',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('account') }}">Cancel</a>
{{ Form::close() }}

@stop