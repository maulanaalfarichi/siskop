@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')

<h2>Edit the Claim</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::model($claim,array('route'=>array('claim.update',$claim->id_claim),'method'=>'PUT')) }}
<div class="form-group">
	{{ Form::label('id_claim','ID Claim') }}
	{{ Form::text('id_claim',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('nama_lengkap','Nama Lengkap') }}
	{{ Form::text('nama_lengkap',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('tempat_lahir','Tempat Lahir') }}
	{{ Form::text('tempat_lahir',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('tanggal_lahir','Tanggal Lahir') }}
	{{ Form::text('tanggal_lahir',date('d-m-Y',strtotime($claim->tanggal_lahir)),array('class'=>'form-control','Placeholder'=>'DD-MM-YYYY')) }}
</div>
<div class="form-group">
	{{ Form::label('alamat_rumah','Alamat Rumah') }}
	{{ Form::text('alamat_rumah',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('hubungan','Hubungan') }}
	{{ Form::select('hubungan',array('Peserta'=>'Peserta','Ahli Waris'=>'Ahli Waris'),null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('jenis_pengajuan','Jenis Pengajuan') }}
	{{ Form::select('jenis_pengajuan',array('Manfaat Nilai Tunai'=>'Manfaat Nilai Tunai','Manfaat Santunan Uang Duka'=>'Manfaat Santunan Uang Duka'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('id_peserta','ID Peserta') }}
	{{ Form::select('id_peserta',array('Pilih Peserta PHT'=>$peserta),null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('id_status','Status') }}
	{{ Form::select('id_status',array('Pilih Status Peserta'=>$status),null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('keterangan','Keterangan') }}
	{{ Form::text('keterangan',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('id_bank','Bank') }}
	{{ Form::select('id_bank',array('Pilih Bank'=>$bank),null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('cabang','Cabang') }}
	{{ Form::text('cabang',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('nama_rekening','Nama Rekening') }}
	{{ Form::text('nama_rekening',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('no_rekening','Nomor Rekening') }}
	{{ Form::text('no_rekening',null,array('class'=>'form-control')) }}
</div>

{{ Form::submit('Update the Claim',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('claim') }}">Cancel</a>
{{ Form::close() }}
@stop