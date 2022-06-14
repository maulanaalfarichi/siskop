@extends('layouts.accounting')
@section('navbar')
@parent
@stop

@section('content')
<div class="col-md-4">
<h2>Create the Rekenings</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'setup')) }}
<div class="form-group">
	{{ Form::label('id_rekening','ID Rekening') }}
	{{ Form::text('id_rekening',Input::old('id_rekening'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('nama_rekening','Nama Rekening') }}
	{{ Form::text('nama_rekening',Input::old('nama_rekening'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('id_klasifikasi','ID Klasifikasi') }}
	{{ Form::select('id_klasifikasi',$klasifikasi,Input::old('id_klasifikasi'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('parent_id','Parent ID') }}
	{{ Form::select('parent_id',$rekening,Input::old('parent_id'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('normal_balance','Normal Balance') }}
	{{ Form::select('normal_balance',array('DEBET'=>'DEBET','KREDIT'=>'KREDIT'),Input::old('normal_balance'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('id_golongan','Golongan') }}
	{{ Form::select('id_golongan',$golongan,Input::old('id_golongan'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('saldo_awal_debet','Saldo Awal Debet') }}
	{{ Form::text('saldo_awal_debet',Input::old('saldo_awal_debet'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('saldo_awal_kredit','Saldo Awal Kredit') }}
	{{ Form::text('saldo_awal_kredit',Input::old(''),array('class'=>'form-control')) }}
</div>
{{ Form::submit('Create the Rekening',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('setup') }}">Cancel</a>
{{ Form::close() }}

</div>

@stop