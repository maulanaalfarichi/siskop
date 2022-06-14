@extends('layouts.accounting')
@section('navbar')
@parent
@stop

@section('content')
<div class="col-md-4">

<h2>Edit the Rekening</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::model($setup,array('route'=>array('setup.update',$setup->id_rekening),'method'=>'PUT')) }}
<div class="form-group">
	{{ Form::label('id_rekening','ID Rekening') }}
	{{ Form::text('id_rekening',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('nama_rekening','Nama Rekening') }}
	{{ Form::text('nama_rekening',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('id_klasifikasi','ID Klasifikasi') }}
	{{ Form::select('id_klasifikasi',$klasifikasi,null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('parent_id','Parent ID') }}
	{{ Form::select('parent_id',$rekening,null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('normal_balance','Normal Balance') }}
	{{ Form::select('normal_balance',array('DEBET'=>'DEBET','KREDIT'=>'KREDIT'),null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('id_golongan','Golongan') }}
	{{ Form::select('id_golongan',$golongan,null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('saldo_awal_debet','Saldo Awal Debet') }}
	{{ Form::text('saldo_awal_debet',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('saldo_awal_kredit','Saldo Awal Kredit') }}
	{{ Form::text('saldo_awal_kredit',null,array('class'=>'form-control')) }}
</div>
{{ Form::submit('Update the Setup',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('setup') }}">Cancel</a>
{{ Form::close() }}

</div>
@stop