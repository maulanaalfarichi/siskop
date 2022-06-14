@extends('layouts.trading')
@section('navbar')
@parent
@stop

@section('content')
<h2>Laporan Penjualan</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'lappenjualan','target'=>'_blank')) }}
<div class="form-group">
	{{ Form::label('tanggal_penjualan','Tanggal Penjualan') }}
	{{ Form::text('tanggal_penjualan',Input::old('tanggal_penjualan'),array('class'=>'form-control','placeholder'=>'DD-MM-YYYY')) }}
</div>

{{ Form::submit('Preview',array('class'=>'btn btn-primary btn-sm')) }}
{{ Form::close() }}

@stop