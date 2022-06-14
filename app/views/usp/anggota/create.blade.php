@extends('layouts.usp')
@section('navbar')
@parent
@stop

@section('content')
<h2>Create the Anggota</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'anggota')) }}
<div class="form-group">
	{{ Form::label('id','ID Anggota') }}
	{{ Form::text('id',Input::old('id'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('nama_anggota','Nama Anggota') }}
	{{ Form::text('nama_anggota',Input::old('nama_anggota'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('jk','Jenis Kelamin') }}
	{{ Form::select('jk',array('Pria'=>'Pria','wanita'=>'Wanita'),Input::old('jk'),array('class'=>'form-control')) }}
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
	{{ Form::label('alamat','Alamat') }}
	{{ Form::text('alamat',Input::old('alamat'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('hp','HP') }}
	{{ Form::text('hp',Input::old('hp'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('no_identitas','No Identitas') }}
	{{ Form::text('no_identitas',Input::old('no_identitas'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('id_pdam','ID PDAM') }}
	{{ Form::select('id_pdam',$data,Input::old('id_pdam'),array('class'=>'form-control')) }}
</div>
{{ Form::submit('Create the Anggota',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('anggota') }}">Cancel</a>
{{ Form::close() }}

@stop