@extends('layouts.adminlte')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Halaman
            <small>Tambah Group</small>
        </h1>
 
       {{ Form::open(array('url' => 'group')) }}
             
            <div class="form-group">
                {{ Form::label('group', 'Group') }}
                {{ Form::text('group', null, array('class' => 'form-control','placeholder'=>'masukkan group')) }}
                {{ '<div>'.$errors->first('group').'</div>' }}
            </div>
             
            <div class="form-group">
                {{ Form::label('bank', 'Bank') }} :
                <label class="checkbox-inline">
                {{Form::checkbox('cb[bank.read]', '1')}} Read
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[bank.create]', '1')}} Create
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[bank.update]', '1')}} Update
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[bank.destroy]', '1')}} Destroy
                </label>
            </div>
            <div class="form-group">
                {{ Form::label('manfaat', 'Manfaat') }} :
                <label class="checkbox-inline">
                {{Form::checkbox('cb[manfaat.read]', '1')}} Read
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[manfaat.create]', '1')}} Create
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[manfaat.update]', '1')}} Update
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[manfaat.destroy]', '1')}} Destroy
                </label>
             
            </div>
            <div class="form-group">
                {{ Form::label('paket', 'Paket') }} :
                <label class="checkbox-inline">
                {{Form::checkbox('cb[paket.read]', '1')}} Read
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[paket.create]', '1')}} Create
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[paket.update]', '1')}} Update
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[paket.destroy]', '1')}} Destroy
                </label>
            </div>
			<div class="form-group">
                {{ Form::label('pdam', 'PDAM') }} :
                <label class="checkbox-inline">
                {{Form::checkbox('cb[pdam.read]', '1')}} Read
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[pdam.create]', '1')}} Create
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[pdam.update]', '1')}} Update
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[pdam.destroy]', '1')}} Destroy
                </label>
            </div>
			<div class="form-group">
                {{ Form::label('peserta', 'Peserta') }} :
                <label class="checkbox-inline">
                {{Form::checkbox('cb[peserta.read]', '1')}} Read
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[peserta.create]', '1')}} Create
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[peserta.update]', '1')}} Update
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[peserta.destroy]', '1')}} Destroy
                </label>
            </div>
			<div class="form-group">
                {{ Form::label('status', 'Status') }} :
                <label class="checkbox-inline">
                {{Form::checkbox('cb[status.read]', '1')}} Read
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[status.create]', '1')}} Create
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[status.update]', '1')}} Update
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[status.destroy]', '1')}} Destroy
                </label>
            </div>
            {{ Form::submit('SIMPAN', array('class' => 'form-control btn btn-primary')) }}
 
        {{ Form::close() }}
 
    </div>
</div>
@stop