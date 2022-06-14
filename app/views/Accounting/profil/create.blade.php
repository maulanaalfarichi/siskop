@extends('layouts.accounting')
@section('navbar')
@parent
@stop

@section('content')
<div class="col-md-4">
<h2>Create the Profil</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'profil')) }}
<div class="form-group">
	{{ Form::label('nama_perusahaan','Nama Perusahaan') }}
	{{ Form::text('nama_perusahaan',Input::old('nama_perusahaan'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('alamat','Alamat') }}
	{{ Form::textarea('alamat',Input::old('alamat'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('telpon','Telpon') }}
	{{ Form::text('telpon',Input::old('telpon'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('fax','Fax') }}
	{{ Form::text('fax',Input::old('fax'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('email','Email') }}
	{{ Form::email('email',Input::old('emaiil'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('website','Website') }}
	{{ Form::text('website',Input::old('website'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('ketua','Ketua') }}
	{{ Form::text('ketua',Input::old('ketua'),array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('manager','Manager') }}
	{{ Form::text('manager',Input::old('manager'),array('class'=>'form-control')) }}
</div>
{{ Form::submit('Create the Rekening',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('profil') }}">Cancel</a>
{{ Form::close() }}
</div>

@stop