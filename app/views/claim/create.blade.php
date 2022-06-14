@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
<h2>Create the Claim</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'claim')) }}
<div class="form-group">
	{{ Form::label('nama_lengkap','Nama Lengkap') }}
	{{ Form::text('nama_lengkap',Input::old('nama_lengkap'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('tempat_lahir','Tempat Lahir') }}
	{{ Form::text('tempat_lahir',Input::old('tempat_lahir'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('tanggal_lahir','Tanggal Lahir') }}
	{{ Form::text('tanggal_lahir',Input::old('tanggal_lahir'),array('class'=>'form-control','Placeholder'=>'DD-MM-YYYY')) }}
</div>
<div class="form-group">
	{{ Form::label('alamat_rumah','Alamat Rumah') }}
	{{ Form::text('alamat_rumah',Input::old('alamat_rumah'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('hubungan','Hubungan') }}
	{{ Form::select('hubungan',array('Peserta'=>'Peserta','Ahli Waris'=>'Ahli Waris'),Input::old('hubungan'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('jenis_pengajuan','Jenis Pengajuan') }}
	{{ Form::select('jenis_pengajuan',array('Manfaat Nilai Tunai'=>'Manfaat Nilai Tunai','Manfaat Santunan Uang Duka'=>'Manfaat Santunan Uang Duka'),Input::old('jenis_pengajuan'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('id_peserta','ID Peserta') }}
	{{ Form::select('id_peserta',array('Pilih Peserta PHT'=>$peserta),Input::old('id_peserta'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('id_status','Status') }}
	{{ Form::select('id_status',array('Pilih Status Peserta'=>$status),Input::old('id_status'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('keterangan','Keterangan') }}
	{{ Form::text('keterangan',Input::old('keterangan'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('id_bank','Bank') }}
	{{ Form::select('id_bank',array('Pilih Bank'=>$bank),Input::old('id_bank'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('cabang','Cabang') }}
	{{ Form::text('cabang',Input::old('cabang'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('nama_rekening','Nama Rekening') }}
	{{ Form::text('nama_rekening',Input::old('nama_rekening'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('no_rekening','Nomor Rekening') }}
	{{ Form::text('no_rekening',Input::old('no_rekening'),array('class'=>'form-control')) }}
</div>
{{ Form::submit('Create the Claim',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('claim') }}">Cancel</a>
{{ Form::close() }}

@stop