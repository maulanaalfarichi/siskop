@extends('layouts.adminlte')
@section('navbar')
@stop

@section('content')

<h2>Register</h2><br>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'register')) }}
<div class="form-group">
	{{ Form::label('first_name','First Name') }}
	{{ Form::text('first_name',Input::old('first_name'),array('class'=>'form-control','placeholder'=>'First Name')) }}
</div>
<div class="form-group">
	{{ Form::label('last_name','Last Name') }}
	{{ Form::text('last_name',Input::old('last_name'),array('class'=>'form-control','placeholder'=>'Last Name')) }}
</div>
<div class="form-group">
	{{ Form::label('email','Email') }}
	{{ Form::text('email',Input::old('email'),array('class'=>'form-control','placeholder'=>'Email')) }}
</div>
<div class="form-group">
	{{ Form::label('password','Password') }}
	{{ Form::password('password',array('class'=>'form-control','placeholder'=>'Password')) }}
</div>
<div class="form-group">
	{{ Form::label('password_confirmation','Password Confirmation') }}
	{{ Form::password('password_confirmation',array('class'=>'form-control','placeholder'=>'Password Confirmation')) }}
</div>
{{ Form::submit('Register',array('class'=>'btn btn-primary')) }}

{{ Form::close() }}

@stop