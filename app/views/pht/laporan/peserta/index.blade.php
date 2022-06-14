@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
<h2>Laporan Peserta</h2>

{{ Form::open(array('url'=>'tampilpeserta')) }}
<div class="form-group">
	{{ Form::label('id_status','Status PHT') }}
	{{ Form::select('id_status',array('Pilih Status'=>$status),Input::old('id_status'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('id_pdam','Cabang PDAM') }}
	{{ Form::select('id_pdam',array('Pilih Cabang PDAM'=>$pdam),Input::old('id_pdam'),array('class'=>'form-control')) }}
</div>

{{ Form::submit('Lihat Laporan',array('class'=>'btn btn-primary btn-sm')) }}
{{ Form::close() }}

@stop