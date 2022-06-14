@extends('layouts.adminlte')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Halaman
            <small>Ubah Group</small>
        </h1>
        {{--*/ $perm = json_decode($groupbyid->permissions, true) /*--}}
 
        {{ Form::model($groupbyid, array('route' => array('group.update', $groupbyid->id),'method' => 'PUT')) }}
             
            <div class="form-group">
                {{ Form::label('group', 'Group') }}
                {{ Form::text('group', $groupbyid->name, array('class' => 'form-control','placeholder'=>'masukkan group')) }}
                {{ '<div>'.$errors->first('group').'</div>' }}
            </div>
 
            <div class="form-group">
                {{ Form::label('account', 'Account') }} :
                <label class="checkbox-inline">
                {{Form::checkbox('cb[account.read]', '1', (!empty($perm['account.read']) == 1 ? true : false))}} Read
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[account.create]', '1', (!empty($perm['account.create']) == 1 ? true : false))}} Create
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[account.update]', '1', (!empty($perm['account.update']) == 1 ? true : false))}} Update
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[account.destroy]', '1', (!empty($perm['account.destroy']) == 1 ? true : false))}} Destroy
                </label>
            </div>
            <div class="form-group">
                {{ Form::label('subaccount', 'Sub Account') }} :
                <label class="checkbox-inline">
                {{Form::checkbox('cb[subaccount.read]', '1', (!empty($perm['subaccount.read']) == 1 ? true : false))}} Read
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[subaccount.create]', '1', (!empty($perm['subaccount.create']) == 1 ? true : false))}} Create
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[subaccount.update]', '1', (!empty($perm['subaccount.update']) == 1 ? true : false))}} Update
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[subaccount.destroy]', '1', (!empty($perm['subaccount.destroy']) == 1 ? true : false))}} Destroy
                </label>
             
            </div>
            <div class="form-group">
                {{ Form::label('coa', 'Chart of Account') }} :
                <label class="checkbox-inline">
                {{Form::checkbox('cb[coa.read]', '1', (!empty($perm['coa.read']) == 1 ? true : false))}} Read
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[coa.create]', '1', (!empty($perm['coa.create']) == 1 ? true : false))}} Create
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[coa.update]', '1', (!empty($perm['coa.update']) == 1 ? true : false))}} Update
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[coa.destroy]', '1', (!empty($perm['coa.destroy']) == 1 ? true : false))}} Destroy
                </label>
            </div>
            <div class="form-group">
                {{ Form::label('register', 'Register') }} :
                <label class="checkbox-inline">
                {{Form::checkbox('cb[register.read]', '1', (!empty($perm['register.read']) == 1 ? true : false))}} Read
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[register.create]', '1', (!empty($perm['register.create']) == 1 ? true : false))}} Create
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[register.update]', '1', (!empty($perm['register.update']) == 1 ? true : false))}} Update
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[register.destroy]', '1', (!empty($perm['register.destroy']) == 1 ? true : false))}} Destroy
                </label>
            </div> 
			<div class="form-group">
                {{ Form::label('group', 'Group') }} :
                <label class="checkbox-inline">
                {{Form::checkbox('cb[group.read]', '1', (!empty($perm['group.read']) == 1 ? true : false))}} Read
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[group.create]', '1', (!empty($perm['group.create']) == 1 ? true : false))}} Create
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[group.update]', '1', (!empty($perm['group.update']) == 1 ? true : false))}} Update
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[group.destroy]', '1', (!empty($perm['group.destroy']) == 1 ? true : false))}} Destroy
                </label>
            </div> 
			<div class="form-group">
                {{ Form::label('user', 'User') }} :
                <label class="checkbox-inline">
                {{Form::checkbox('cb[user.read]', '1', (!empty($perm['user.read']) == 1 ? true : false))}} Read
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[user.create]', '1', (!empty($perm['user.create']) == 1 ? true : false))}} Create
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[user.update]', '1', (!empty($perm['user.update']) == 1 ? true : false))}} Update
                </label>
                <label class="checkbox-inline">
                {{Form::checkbox('cb[user.destroy]', '1', (!empty($perm['user.destroy']) == 1 ? true : false))}} Destroy
                </label>
            </div> 
            {{ Form::submit('SIMPAN', array('class' => 'form-control')) }}
 
        {{ Form::close() }}
 
    </div>
</div>
@stop