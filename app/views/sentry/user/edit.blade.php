@extends('layouts.adminlte')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Halaman
            <small>Ubah User</small>
        </h1>
 
       {{ Form::model($userbyid, array('route' => array('user.update', $userbyid->id),'method' => 'PUT')) }}
              
            <div class="form-group">
                {{ Form::label('nama_depan', 'Nama Depan') }}
                {{ Form::text('nama_depan', $userbyid->first_name, array('class' => 'form-control','placeholder'=>'masukkan nama depan')) }}
                {{ '<div>'.$errors->first('nama_depan').'</div>' }}
            </div>
            <div class="form-group">
                {{ Form::label('nama_belakang', 'Nama Belakang') }}
                {{ Form::text('nama_belakang', $userbyid->last_name, array('class' => 'form-control','placeholder'=>'masukkan nama belakang')) }}
                {{ '<div>'.$errors->first('nama_belakang').'</div>' }}
            </div>
            <div class="form-group">
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email', null, array('class' => 'form-control','placeholder'=>'masukkan email')) }}
                {{ '<div>'.$errors->first('email').'</div>' }}
            </div>
            <div class="form-group">
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password', array('class' => 'form-control','placeholder'=>'masukkan password')) }}
                {{ '<div>'.$errors->first('password').'</div>' }}
            </div>
            <div class="form-group">
                {{ Form::label('password_confirmation', 'Password Confirmation') }}
                {{ Form::password('password_confirmation', array('class' => 'form-control','placeholder'=>'masukkan password confirmation')) }}
                {{ '<div>'.$errors->first('password_confirmation').'</div>' }}
            </div>
            <div class="form-group">
                {{ Form::label('group', 'Group') }}
                {{ Form::select('group', $group, $groupbyuser, array('class' => 'form-control', 'placeholder' => 'Select Group...')); }}
                {{ '<div>'.$errors->first('group').'</div>' }}
            </div>
            {{ Form::submit('SIMPAN', array('class' => 'form-control')) }}
 
        {{ Form::close() }}
 
    </div>
</div>
@stop