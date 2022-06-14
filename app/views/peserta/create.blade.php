@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
<h2>Create the Peserta</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'peserta')) }}
<div class="form-group">
	{{ Form::label('nama_peserta','Nama Peserta') }}
	{{ Form::text('nama_peserta',Input::old('nama_peserta'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('tempat_lahir','Tempat Lahir') }}
	{{ Form::text('tempat_lahir',Input::old('tempat_lahir'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('tanggal_lahir','Tanggal Lahir') }}
	{{ Form::text('tanggal_lahir',Input::old('tanggal_lahir'),array('class'=>'form-control','placeholder'=>'DD-MM-YYYY')) }}
</div>
<div class="form-group">
	{{ Form::label('jenis_kelamin','Jenis Kelamin') }}
	{{ Form::select('jenis_kelamin',array('L' => 'Laki-laki','P' => 'Perempuan'),Input::old('jenis_kelamin'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('alamat','Alamat') }}
	{{ Form::textarea('alamat',Input::old('alamat'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('telpon','Telepon') }}
	{{ Form::text('telpon',Input::old('telpon'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('handphone','Handphone') }}
	{{ Form::text('handphone',Input::old('handphone'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('id_pdam','NAMA PDAM') }}
	{{ Form::select('id_pdam',array('Pilih Cabang PDAM'=>$pdam),Input::old('id_pdam'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('id_paket','Paket PHT') }}
	{{ Form::select('id_paket',array('Pilih Paket' => $paket),Input::old('id_paket'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('tanggal_masuk','Tanggal Masuk') }}
	{{ Form::text('tanggal_masuk',Input::old('tanggal_masuk'),array('class'=>'form-control','placeholder'=>'DD-MM-YYYY')) }}
</div>
<div class="form-group">
	{{ Form::label('tanggal_berhenti','Tanggal Berhenti') }}
	{{ Form::text('tanggal_berhenti',Input::old('tanggal_berhenti'),array('class'=>'form-control','placeholder'=>'DD-MM-YYYY')) }}
</div>
<div class="form-group">
	{{ Form::label('tanggal_proses','Tanggal Proses') }}
	{{ Form::text('tanggal_proses',Input::old('tanggal_proses'),array('class'=>'form-control','placeholder'=>'DD-MM-YYYY')) }}
</div>
<div class="form-group">
	{{ Form::label('nama_ahli_waris','Nama Ahli Waris') }}
	{{ Form::text('nama_ahli_waris',Input::old('nama_ahli_waris'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('id_bank','Nama Bank') }}
	{{ Form::select('id_bank',array('Pilih Bank'=>$bank),Input::old('id_bank'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('nomor_rekening','Nomor Rekening') }}
	{{ Form::text('nomor_rekening',Input::old('nomor_rekening'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('atas_nama','Atas Nama') }}
	{{ Form::text('atas_nama',Input::old('atas_nama'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('id_status','ID Status') }}
	{{ Form::select('id_status',array('Pilih Status'=>$status),Input::old('id_status'),array('class'=>'form-control')) }}
</div>
{{ Form::submit('Create the Peserta',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('peserta') }}">Cancel</a>
{{ Form::close() }}

@stop