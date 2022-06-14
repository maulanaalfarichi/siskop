@extends('layouts.accounting')
@section('navbar')
@parent
@stop

@section('content')
<div class="col-md-4">
<h2>Edit the Profil</h2>

{{ HTML::ul($errors->all()) }}

{{ Form::model($profil,array('route'=>array('profil.update',$profil->id),'method'=>'PUT')) }}
<div class="form-group">
	{{ Form::label('nama_perusahaan','Nama Perusahaan') }}
	{{ Form::text('nama_perusahaan',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('alamat','Alamat') }}
	{{ Form::textarea('alamat',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('telpon','Telpon') }}
	{{ Form::text('telpon',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('fax','Fax') }}
	{{ Form::text('fax',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('email','Email') }}
	{{ Form::email('email',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('website','Website') }}
	{{ Form::url('website',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('ketua','Ketua') }}
	{{ Form::text('ketua',null,array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('manager','Manager') }}
	{{ Form::text('manager',null,array('class'=>'form-control')) }}
</div>

{{ Form::submit('Update the Profil',array('class'=>'btn btn-primary btn-sm')) }}&nbsp
<a class="btn btn-danger btn-sm" href="{{ URL::to('profil') }}">Cancel</a>
{{ Form::close() }}
</div>
@stop