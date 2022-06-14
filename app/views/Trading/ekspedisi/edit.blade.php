@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')

<h2>Edit the Ekspedisi</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::model($ekspedisi,array('route'=>array('ekspedisi.update',$ekspedisi->id),'method'=>'PUT')) }}
<div class="form-group">
	{{ Form::label('nama','Nama Ekspedisi') }}
	{{ Form::text('nama',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('alamat','Alamat') }}
	{{ Form::text('alamat',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('kota','Kota') }}
	{{ Form::text('kota',null,array('class'=>'form-control')) }}
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
	{{ Form::label('daerah','Daerah') }}
	{{ Form::text('daerah',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('email','Email') }}
	{{ Form::email('email',null,array('class'=>'form-control')) }}
</div>
{{ Form::submit('Update the Ekspedisi',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('ekspedisi') }}">Cancel</a>
{{ Form::close() }}
@stop