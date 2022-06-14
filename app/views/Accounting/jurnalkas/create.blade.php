@extends('layouts.accounting')
@section('navbar')
@parent
@stop

@section('content')
<h2>Create the Jurnal Kas Keluar</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'jurnalkas')) }}
<div class="form-group">
	{{ Form::label('no_bukti','Nomor Bukti') }}
	{{ Form::text('no_bukti',Input::old('no_bukti'),array('class'=>'form-control','disabled')) }}
</div>
<div class="form-group">
	{{ Form::label('tanggal','Tanggal') }}
	{{ Form::text('tanggal',Input::old('tanggal'),array('class'=>'form-control','placeholder'=>'DD-MM-YYYY')) }}
</div>
<div class="form-group">
	{{ Form::label('keterangan_jurnal','Keterangan Jurnal') }}
	{{ Form::textarea('keterangan_jurnal',Input::old('keterangan_jurnal'),array('class'=>'form-control')) }}
</div>
<h2>Kode Rekening Sisi Debet</h2>
<div class="form-group">
	{{ Form::label('id_rekening','Rekening') }}
	{{ Form::select('id_rekening',$rekening,Input::old('id_rekening'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('keterangan_transaksi','Keterangan Transaksi') }}
	{{ Form::textarea('keterangan_transaksi',Input::old('keterangan_transaksi'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('jumlah','Jumlah') }}
	{{ Form::text('jumlah',Input::old('jumlah'),array('class'=>'form-control')) }}
</div>
{{ Form::submit('Create the Journal Kas Keluar',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('jurnalkas') }}">Cancel</a>
{{ Form::close() }}

@stop