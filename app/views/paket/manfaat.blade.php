@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')

@foreach($manfaat as $key => $value)
	{{ $value->id_paket }}
@endforeach


@stop