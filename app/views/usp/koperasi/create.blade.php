@extends('layouts.usp')
@section('navbar')
@parent
@stop

@section('content')
<h2>Create the Koperasi</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'koperasi')) }}
<div class="form-group">
	{{ Form::label('nama_koperasi','Nama Koperasi') }}
	{{ Form::text('nama_koperasi',Input::old('nama_koperasi'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('alamat','Alamat') }}
	{{ Form::text('alamat',Input::old('alamat'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('telp','Telp') }}
	{{ Form::text('telp',Input::old('telp'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('fax','Fax') }}
	{{ Form::text('fax',Input::old('fax'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('pengurus1','Pengurus 1') }}
	{{ Form::text('pengurus1',Input::old('pengurus1'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('pengurus2','Pengurus 2') }}
	{{ Form::text('pengurus2',Input::old('pengurus2'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('pengurus3','Pengurus 3') }}
	{{ Form::text('pengurus3',Input::old('pengurus3'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('pengawas','Pengawas') }}
	{{ Form::text('pengawas',Input::old('pengawas'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('email','Email') }}
	{{ Form::email('email',Input::old('email'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('simpanan_pokok','Simpanan Pokok') }}
	{{ Form::text('simpanan_pokok',Input::old('simpanan_pokok'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('simpanan_wajib','Simpanan Wajib') }}
	{{ Form::text('simpanan_wajib',Input::old('simpanan_wajib'),array('class'=>'form-control')) }}
</div>
{{ Form::submit('Create the Koperasi',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('koperasi') }}">Cancel</a>
{{ Form::close() }}

@stop