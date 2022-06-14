@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
<div class="col-md-4">
<h2>Edit the Bank</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::model($bank,array('route'=>array('bank.update',$bank->id_bank),'method'=>'PUT')) }}
<div class="form-group">
	{{ Form::label('id_bank','ID Bank') }}
	{{ Form::text('id_bank',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('nama_bank','Nama Bank') }}
	{{ Form::text('nama_bank',null,array('class'=>'form-control')) }}
</div>
{{ Form::submit('Update the Bank',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('bank') }}">Cancel</a>
{{ Form::close() }}
</div>
@stop