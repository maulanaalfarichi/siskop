@extends('layouts.usp')
@section('navbar')
@parent
@stop

@section('content')
<h2>Laporan Pinjaman</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'lappinjaman')) }}
<div class="form-group">
	{{ Form::label('tanggal_pinjam','Tanggal Pinjam') }}
	{{ Form::text('tanggal_pinjam',Input::old('tanggal_pinjam'),array('class'=>'form-control','placeholder'=>'DD-MM-YYYY')) }}
</div>

{{ Form::submit('Preview',array('class'=>'btn btn-primary btn-sm')) }}
{{ Form::close() }}

@stop