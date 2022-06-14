@extends('layouts.usp')
@section('navbar')
@parent
@stop

@section('content')
<h2>Create the Pengambilan</h2>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif


{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'pengambilan')) }}
<div class="form-group">
	{{ Form::label('id_anggota','ID Anggota') }}
	{{ Form::text('id_anggota',Input::old('id_anggota'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('jumlah','Jumlah') }}
	{{ Form::text('jumlah',Input::old('jumlah'),array('class'=>'form-control')) }}
</div>
{{ Form::submit('Create the Jenis Simpanan',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('pengambilan') }}">Cancel</a>
{{ Form::close() }}

@stop