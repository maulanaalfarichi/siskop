@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')

<h2>View All Status</h2><br>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

<a class="btn btn-primary btn-sm" href="{{ URL::to('status/create') }}">Create New</a><br><br>

{{ 	Datatable::table()
	->addColumn('id_status','keterangan','tarif','Action')
	->setOptions('aoColumnDefs',array(
			array(
				'bVisible' => 'id_status' ,
				'aTargets' => [0]),
			array(
				'bVisible' => 'keterangan' ,
				'aTargets' => [1]),
			array(
				'bVisible' => 'tarif',
				'aTargets' => [2]),
			array(
				'bSortable' => false,
				'aTargets' => [3])
			))
	->setOptions('bProcessing',true)
	->setUrl(route('status.index'))
	->render()
}}

@stop