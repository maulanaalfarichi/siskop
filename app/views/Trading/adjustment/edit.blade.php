@extends('layouts.trading')
@section('navbar')
@parent
@stop

@section('content')

<h2>Edit the Adjustment</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::model($data,array('route'=>array('adjustment.update',$data->id),'method'=>'PUT')) }}
<div class="form-group">
	{{ Form::label('id_barang','ID Barang') }}
	{{ Form::text('id_barang',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('jenis_adjust','Jenis Adjust') }}
	{{ Form::select('jenis_adjust',array('+'=>'+','-'=>'-'),null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('jml_adjust','Jumlah Adjustment') }}
	{{ Form::text('jml_adjust',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('keterangan','Keterangan') }}
	{{ Form::text('keterangan',null,array('class'=>'form-control')) }}
</div>
{{ Form::submit('Edit the Adjustment',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('adjustment') }}">Cancel</a>
{{ Form::close() }}
@stop