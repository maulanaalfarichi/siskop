@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
<h2>Create the SubAccount</h2>

{{ HTML::ul($errors->all()) }}


{{ Form::open(array('url'=>'subaccount')) }}
<div class="form-group">
	{{ Form::label('id','SubAccount ID') }}
	{{ Form::text('id',Input::old('id'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('subaccount_name','SubAccount Name') }}
	{{ Form::text('subaccount_name',Input::old('subaccount_name'),array('class'=>'form-control')) }}
</div>
{{ Form::submit('Create the SubAccount',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('subaccount') }}">Cancel</a>
{{ Form::close() }}

@stop