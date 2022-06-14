@extends('layouts.adminlte')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Halaman
            <small>Daftar Group</small>
        </h1>
        @if (Session::has('message'))
            {{ Session::get('message') }}
        @endif
        <p><a href="{{ URL::to('group/create') }}" class="btn btn-primary" role="button">Tambah Group Baru</a></p>
        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="10">ID</th>
                                        <th>Group</th>
                                        <th width="146">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($group as $key => $value)
                                    <tr>
                                        <td>{{{ $value->id }}}</td>
                                        <td>{{{ $value->name }}}</td>
                                        <td>
                                            {{ Form::open(array('url' =>'group/'.$value->id)) }}
                                            <div class="btn-group">
                                            <a href="{{ URL::to('group/' . $value->id . '/edit') }}" class="btn btn-primary">Ubah</a>
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
            {{$group->links()}}
 
    </div>
</div>
@stop