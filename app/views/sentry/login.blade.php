@extends('layouts.login')
@section('navbar')
@stop

@section('content')

<h2>SISFO INKOPPAMSI</h2><br>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'login')) }}
<div class="form-group">
	{{ Form::label('email','Email') }}
	{{ Form::text('email',Input::old('email'),array('class'=>'form-control','placeholder'=>'Email')) }}
</div>
<div class="form-group">
	{{ Form::label('password','Password') }}
	{{ Form::password('password',array('class'=>'form-control','placeholder'=>'Password')) }}
</div>
<div class="form-group">
	{{ Form::submit('Login',array('class'=>'btn btn-primary form-control')) }}
</div>
{{ Form::close() }}

@stop