@extends('layouts.portal')

@section('navbar')

@parent

@stop

@section('content')

<h3>Error 404, Page Not Found..!</h3>
Click <a href="{{ URL::to('portal') }}">Here</a> to <a href="{{ URL::to('portal') }}">login.</a> 

@stop