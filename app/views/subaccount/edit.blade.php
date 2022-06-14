@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')

<h2>Edit  the SubAccount</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::model($subaccount,array('route'=>array('subaccount.update',$subaccount->id),'method'=>'PUT')) }}
<div class="form-group">
	{{ Form::label('id','SubAccount ID') }}
	{{ Form::text('id',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('subaccount_name','SubAccount Name') }}
	{{ Form::text('subaccount_name',null,array('class'=>'form-control')) }}
</div>
{{ Form::submit('Update the Subaccount',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('subaccount') }}">Cancel</a>
{{ Form::close() }}
@stop