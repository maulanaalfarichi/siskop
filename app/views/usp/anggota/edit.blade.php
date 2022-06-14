@extends('layouts.usp')
@section('navbar')
@parent
@stop

@section('content')

<h2>Edit the Jenis Anggota</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::model($data,array('route'=>array('anggota.update',$data->id),'method'=>'PUT')) }}
<div class="form-group">
	{{ Form::label('id','ID Anggota') }}
	{{ Form::text('id',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('nama_anggota','Nama Anggota') }}
	{{ Form::text('nama_anggota',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('jk','Jenis Kelamin') }}
	{{ Form::select('jk',array('Pria'=>'Pria','wanita'=>'Wanita'),null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('tempat_lahir','Tempat Lahir') }}
	{{ Form::text('tempat_lahir',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('tanggal_lahir','Tanggal Lahir') }}
	{{ Form::text('tanggal_lahir',null,array('class'=>'form-control','placeholder'=>'DD-MM-YYYY')) }}
</div>
<div class="form-group">
	{{ Form::label('alamat','Alamat') }}
	{{ Form::text('alamat',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('hp','HP') }}
	{{ Form::text('hp',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('no_identitas','No Identitas') }}
	{{ Form::text('no_identitas',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('id_pdam','ID PDAM') }}
	{{ Form::select('id_pdam',$pdam,null,array('class'=>'form-control')) }}
</div>
{{ Form::submit('Update the Jenis Anggota',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('anggota') }}">Cancel</a>
{{ Form::close() }}
@stop