@extends('layouts.usp')
@section('navbar')
@parent
@stop

@section('content')

<h2>View All Koperasi</h2><br>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

<a class="btn btn-primary btn-sm" href="{{ URL::to('koperasi/create') }}">Create New</a><br><br>

{{ 	Datatable::table()
	->addColumn('id','nama_koperasi','alamat','telp','fax','email','Action')
	->setOptions('aoColumnDefs',array(
			array(
				'bVisible' => 'id' ,
				'aTargets' => [0]),
			array(
				'bVisible' => 'nama_koperasi' ,
				'aTargets' => [1]),
			array(
				'bVisible' => 'alamat' ,
				'aTargets' => [2]),
			array(
				'bVisible' => 'telp' ,
				'aTargets' => [3]),
			array(
				'bVisible' => 'fax' ,
				'aTargets' => [4]),
			array(
				'bVisible' => 'email' ,
				'aTargets' => [5]),
			array(
				'bSortable' => false,
				'aTargets' => [6])
			))
	->setOptions('bProcessing',true)
	->setUrl(route('koperasi.index'))
	->render()
}}


@stop