@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
<div class="col-md-4">
<h2>Edit the PDAM</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::model($pdam,array('route'=>array('pdam.update',$pdam->id_pdam),'method'=>'PUT')) }}
<div class="form-group">
	{{ Form::label('id_pdam','ID PDAM') }}
	{{ Form::text('id_pdam',null,array('class'=>'form-control','readonly')) }}
</div>
<div class="form-group">
	{{ Form::label('nama_pdam','Nama PDAM') }}
	{{ Form::text('nama_pdam',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('alamat','Alamat') }}
	{{ Form::textarea('alamat',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('telepon','Telepon') }}
	{{ Form::text('telepon',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('fax','Fax') }}
	{{ Form::text('fax',null,array('class'=>'form-control')) }}
</div>
{{ Form::submit('Update the PDAM',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('pdam') }}">Cancel</a>
{{ Form::close() }}
</div>
@stop