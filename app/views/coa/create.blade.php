@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
<h2>Create the COA</h2>

{{ HTML::ul($errors->all()) }}


{{ Form::open(array('url'=>'coa')) }}
<div class="form-group">
	{{ Form::label('account_id','Account ID') }}
	{{ Form::select('account_id',array('0'=>'All',$account),Input::old('account_id'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('subaccount_id','SubAccount ID') }}
	{{ Form::select('subaccount_id',array('0'=>'All',$subaccount),Input::old('subaccount_id'),array('class'=>'form-control')) }}
</div>
{{ Form::submit('Create the Account',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('coa') }}">Cancel</a>
{{ Form::close() }}

@stop