@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')

<h2>Edit the Supplier</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::model($supplier,array('route'=>array('supplier.update',$supplier->id),'method'=>'PUT')) }}
<div class="form-group">
	{{ Form::label('nama_supplier','Nama Supplier') }}
	{{ Form::text('nama_supplier',null,array('class'=>'form-control')) }}
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
	{{ Form::label('product','Product') }}
	{{ Form::text('product',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('email','Email') }}
	{{ Form::email('email',null,array('class'=>'form-control')) }}
</div>{{ Form::submit('Update the Supplier',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('supplier') }}">Cancel</a>
{{ Form::close() }}
@stop