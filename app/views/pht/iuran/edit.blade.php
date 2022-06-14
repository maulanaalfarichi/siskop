@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
<div class="col-md-4">

<h2>Form Payment</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::model($iuran,array('route'=>array('iuran.update',$iuran->id),'method'=>'PUT')) }}
<div class="form-group">
	{{ Form::label('id_peserta','ID Peserta') }}
	{{ Form::text('id_peserta',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('cicilan_ke','Cicilan Ke-') }}
	{{ Form::text('cicilan_ke',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('iuran','Iuran') }}
	{{ Form::text('iuran',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('keterangan','Keterangan') }}
	{{ Form::textarea('keterangan',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('tanggal_bayar','Tanggal Bayar') }}
	{{ Form::text('tanggal_bayar',date('d-m-Y',strtotime($iuran->tanggal_bayar)),array('class'=>'form-control','placeholder'=>'DD-MM-YYYY')) }}
</div>
<div class="form-group">
	{{ Form::label('id_bank','Bank') }}
	{{ Form::select('id_bank',array($bank),null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('status','Status') }}
	{{ Form::select('status',array('LUNAS'=>'LUNAS','TUNDA'=>'TUNDA'),null,array('class'=>'form-control')) }}
</div>
{{ Form::submit('Pay Now',array('class'=>'btn btn-primary btn-sm',$status)) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('iuran') }}">Cancel</a>
{{ Form::close() }}

</div>
@stop