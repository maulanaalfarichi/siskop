@extends('layouts.usp')
@section('navbar')
@parent
@stop

@section('content')
<h2>Create the Bayar Pinjaman</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'bayarpinjaman')) }}
<div class="form-group">
	{{ Form::label('id','ID Pinjam') }}
	{{ Form::text('id',Input::old('id'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('jumlah','Jumlah') }}
	{{ Form::text('jumlah',Input::old('jumlah'),array('class'=>'form-control')) }}
</div>
{{ Form::submit('Create the Jenis Simpanan',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('bayarpinjaman') }}">Cancel</a>
{{ Form::close() }}

@stop