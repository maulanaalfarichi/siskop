@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
<div class="row">

<h2>Edit the Peserta</h2>

{{ HTML::ul($errors->all()) }}

<div class="col-md-4">
{{ Form::model($peserta,array('route'=>array('peserta.update',$peserta->id_peserta),'method'=>'PUT')) }}
<div class="form-group">
	{{ Form::label('id_peserta','ID Peserta') }}
	{{ Form::text('id_peserta',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('nama_peserta','Nama Peserta') }}
	{{ Form::text('nama_peserta',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('tempat_lahir','Tempat Lahir') }}
	{{ Form::text('tempat_lahir',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('tanggal_lahir','Tanggal Lahir') }}
	{{ Form::text('tanggal_lahir',date('d-m-Y',strtotime($peserta->tanggal_lahir)),array('class'=>'form-control','placeholder'=>'DD-MM-YYYY')) }}
</div>
<div class="form-group">
	{{ Form::label('jenis_kelamin','Jenis Kelamin') }}
	{{ Form::select('jenis_kelamin',array('L' => 'Laki-laki','P' => 'Perempuan'),null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('alamat','Alamat') }}
	{{ Form::textarea('alamat',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('telpon','Telepon') }}
	{{ Form::text('telpon',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('handphone','Handphone') }}
	{{ Form::text('handphone',null,array('class'=>'form-control')) }}
</div>
{{ Form::submit('Update the Peserta',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('peserta') }}">Cancel</a>
</div>
<div class="col-md-4">
<div class="form-group">
	{{ Form::label('id_pdam','NAMA PDAM') }}
	{{ Form::select('id_pdam',array('Pilih Cabang PDAM'=>$pdam),null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('id_paket','Paket PHT') }}
	{{ Form::select('id_paket',array('Pilih Paket' => $paket),null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('tanggal_masuk','Tanggal Masuk') }}
	{{ Form::text('tanggal_masuk',date('d-m-Y',strtotime($peserta->tanggal_masuk)),array('class'=>'form-control','placeholder'=>'DD-MM-YYYY')) }}
</div>
<div class="form-group">
	{{ Form::label('tanggal_berhenti','Tanggal Berhenti') }}
	{{ Form::text('tanggal_berhenti',date('d-m-Y',strtotime($peserta->tanggal_berhenti)),array('class'=>'form-control','placeholder'=>'DD-MM-YYYY')) }}
</div>
<div class="form-group">
	{{ Form::label('tanggal_proses','Tanggal Proses') }}
	{{ Form::text('tanggal_proses',date('d-m-Y',strtotime($peserta->tanggal_proses)),array('class'=>'form-control','placeholder'=>'DD-MM-YYYY')) }}
</div>
<div class="form-group">
	{{ Form::label('nama_ahli_waris','Nama Ahli Waris') }}
	{{ Form::text('nama_ahli_waris',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('id_bank','Nama Bank') }}
	{{ Form::select('id_bank',array('Pilih Bank'=>$bank),null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('nomor_rekening','Nomor Rekening') }}
	{{ Form::text('nomor_rekening',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('atas_nama','Atas Nama') }}
	{{ Form::text('atas_nama',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('id_status','ID Status') }}
	{{ Form::select('id_status',array('Pilih Status'=>$status),null,array('class'=>'form-control')) }}
</div>
</div>

{{ Form::close() }}
</div>
@stop