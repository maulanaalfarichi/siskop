@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
<div class="col-md-4">
<h2>Edit the Manfaat</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::model($manfaat,array('route'=>array('manfaat.update',$manfaat->id),'method'=>'PUT')) }}
<div class="form-group">
	{{ Form::label('id_paket','ID Paket') }}
	{{ Form::select('id_paket',array('Pilih Paket PHT'=>$paket),null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('bulan','Bulan ke-') }}
	{{ Form::text('bulan',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('manfaat','Manfaat') }}
	{{ Form::text('manfaat',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('santunan','Santunan') }}
	{{ Form::text('santunan',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('tambahan','Tambahan') }}
	{{ Form::text('tambahan',null,array('class'=>'form-control')) }}
</div>
{{ Form::submit('Update the Manfaat',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('manfaat') }}">Cancel</a>
{{ Form::close() }}

</div>
@stop