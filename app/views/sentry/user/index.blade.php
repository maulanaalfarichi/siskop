@extends('layouts.adminlte')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Halaman
            <small>Daftar User</small>
        </h1>
        @if (Session::has('message'))
            {{ Session::get('message') }}
        @endif
        <p><a href="{{ URL::to('user/create') }}" class="btn btn-primary" role="button">Tambah User Baru</a></p>
        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="10">ID</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th width="147">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($user as $value)
                                    <tr>
                                        <td>{{{ $value->id }}}</td>
                                        <td>{{{ $value->first_name.' '.$value->last_name }}}</td>
                                        <td>{{{ $value->email }}}</td>
                                        <td>
                                            {{ Form::open(array('url' => 'user/' . $value->id)) }}
                                            <div class="btn-group">
                                            <a href="{{ URL::to('user/' . $value->id . '/edit') }}" class="btn btn-primary">Ubah</a>
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{Form::button('Hapus', array('type' => 'submit', 'class' => 'btn btn-primary'))}}
                                            </div>
                                            {{ Form::close() }}
                                        </td>
                                    </tr>
                                @endforeach   
                                </tbody>
                            </table>
            </div>
            {{$user->links()}}
 
    </div>
</div>
@stop