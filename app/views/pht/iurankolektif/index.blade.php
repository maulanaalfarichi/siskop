@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
<div class="col-md-4">
<h2>Pembayaran Iuran Kolektif</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'iurankolektif')) }}
<div class="form-group">
	{{ Form::label('id_pdam','NAMA PDAM') }}
	{{ Form::select('id_pdam',$pdam,Input::old('id_pdam'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('bln_thn','BLN-THN') }}
	{{ Form::text('bln_thn',Input::old('bln_thn'),array('class'=>'form-control','placeholder'=>'MM-YYYY')) }}
</div>
{{ Form::submit('Find Data',array('class'=>'btn btn-primary btn-sm')) }}
{{ Form::close() }}
</div>



@stop