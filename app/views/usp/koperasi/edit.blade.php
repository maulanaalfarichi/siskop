@extends('layouts.usp')
@section('navbar')
@parent
@stop

@section('content')

<h2>Edit the Jenis Anggota</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::model($data,array('route'=>array('koperasi.update',$data->id),'method'=>'PUT')) }}
<div class="form-group">
	{{ Form::label('nama_koperasi','Nama Koperasi') }}
	{{ Form::text('nama_koperasi',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('alamat','Alamat') }}
	{{ Form::text('alamat',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('telp','Telp') }}
	{{ Form::text('telp',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('fax','Fax') }}
	{{ Form::text('fax',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('pengurus1','Pengurus 1') }}
	{{ Form::text('pengurus1',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('pengurus2','Pengurus 2') }}
	{{ Form::text('pengurus2',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('pengurus3','Pengurus 3') }}
	{{ Form::text('pengurus3',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('pengawas','Pengawas') }}
	{{ Form::text('pengawas',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('email','Email') }}
	{{ Form::email('email',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('simpanan_pokok','Simpanan Pokok') }}
	{{ Form::text('simpanan_pokok',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('simpanan_wajib','Simpanan Wajib') }}
	{{ Form::text('simpanan_wajib',null,array('class'=>'form-control')) }}
</div>
{{ Form::submit('Update the Koperasi',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('koperasi') }}">Cancel</a>
{{ Form::close() }}
@stop