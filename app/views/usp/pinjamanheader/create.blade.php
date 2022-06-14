@extends('layouts.usp')
@section('navbar')
@parent
@stop

@section('content')
<h2>Create the Pinjaman</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'pinjamanheader')) }}
<div class="form-group">
	{{ Form::label('id_anggota','ID Anggota') }}
	{{ Form::text('id_anggota',Input::old('enis_simpanan'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('pokok_pembiayaan','Pokok Pembiayaan') }}
	{{ Form::text('pokok_pembiayaan',Input::old('pokok_pembiayaan'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('perkiraan_nisbah','Perkiraan Nisbah') }}
	{{ Form::text('perkiraan_nisbah',Input::old('perkiraan_nisbah'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('maksimum_pembiayaan','Maksimum Pembiayaan') }}
	{{ Form::text('maksimum_pembiayaan',Input::old('maksimum_pembiayaan'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('jangka_waktu','Jangka Waktu') }}
	{{ Form::text('jangka_waktu',Input::old('jangka_waktu'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('keterangan','Keterangan') }}
	{{ Form::text('keterangan',Input::old('keterangan'),array('class'=>'form-control')) }}
</div>
{{ Form::submit('Create the Pinjaman',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('pinjamanheader') }}">Cancel</a>
{{ Form::close() }}

@stop