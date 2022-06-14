@extends('layouts.trading')
@section('navbar')
@parent
@stop

@section('content')

<h2>Edit the Penjualan</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::model($data,array('route'=>array('penjualan.update',$data->id),'method'=>'PUT')) }}
<div class="form-group">
	{{ Form::label('id','ID Penjualan') }}
	{{ Form::text('id',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('id_pelanggan','Pelanggan') }}
	{{ Form::select('id_pelanggan',$pelanggan,null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('id_ekspedisi','Ekspedisi') }}
	{{ Form::select('id_ekspedisi',$ekspedisi,null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('jumlah','Jumlah') }}
	{{ Form::text('jumlah',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('diskon','Diskon') }}
	{{ Form::text('diskon',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('ongkos_kirim','Ongkos Kirim') }}
	{{ Form::text('ongkos_kirim',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('ppn','PPN') }}
	{{ Form::text('ppn',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('total','Total') }}
	{{ Form::text('total',null,array('class'=>'form-control')) }}
</div>
{{ Form::submit('Edit the Penjualan',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('penjualan') }}">Cancel</a>
{{ Form::close() }}
@stop