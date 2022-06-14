@extends('layouts.trading')
@section('navbar')
@parent
@stop

@section('content')
<h2>Create the Penjualan</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'penjualan')) }}
<div class="form-group">
	{{ Form::label('id','ID Penjualan') }}
	{{ Form::text('id',Input::old('id_penjualan'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('id_pelanggan','Pelanggan') }}
	{{ Form::select('id_pelanggan',$pelanggan,Input::old('id_pelanggan'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('id_ekspedisi','Ekspedisi') }}
	{{ Form::select('id_ekspedisi',$ekspedisi,Input::old('id_ekspedisi'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('jumlah','Jumlah') }}
	{{ Form::text('jumlah',Input::old('jumlah'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('diskon','Diskon') }}
	{{ Form::text('diskon',Input::old('diskon'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('ongkos_kirim','Ongkos Kirim') }}
	{{ Form::text('ongkos_kirim',Input::old('ongkos_kirim'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('ppn','PPN') }}
	{{ Form::text('ppn',Input::old('ppn'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('total','Total') }}
	{{ Form::text('total',Input::old('total'),array('class'=>'form-control')) }}
</div>
{{ Form::submit('Create the Penjualan',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('penjualan') }}">Cancel</a>
{{ Form::close() }}

@stop