@extends('layouts.trading')
@section('navbar')
@parent
@stop

@section('content')

<h2>Edit the Pelanggan</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::model($data,array('route'=>array('pelanggan.update',$data->id),'method'=>'PUT')) }}
<div class="form-group">
	{{ Form::label('nama_pelanggan','Nama Pelanggan') }}
	{{ Form::text('nama_pelanggan',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('alamat','Alamat') }}
	{{ Form::text('alamat',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('contact','Contact') }}
	{{ Form::text('contact',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('telp','Telpon') }}
	{{ Form::text('telp',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('fax','Fax') }}
	{{ Form::text('fax',null,array('class'=>'form-control')) }}
</div>
{{ Form::submit('Edit the Pelanggan',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('pelanggan') }}">Cancel</a>
{{ Form::close() }}
@stop