@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')

<h2>View All Manfaat</h2><br>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

<a class="btn btn-primary btn-sm" href="{{ URL::to('manfaat/create') }}">Create New</a><br><br>

{{ 	Datatable::table()
	->addColumn('id_paket','bulan','manfaat','santunan','tambahan','Action')
	->setOptions('aoColumnDefs',array(
			array(
				'bVisible' => 'id_paket' ,
				'aTargets' => [0]),
			array(
				'bVisible' => 'nama_bulan' ,
				'aTargets' => [1]),
			array(
				'bVisible' => 'manfaat',
				'aTargets' => [2]),
			array(
				'bVisible' => 'santunan',
				'aTargets' => [3]),
			array(
				'bVisible' => 'tambahan',
				'aTargets' => [4]),
			array(
				'bSortable' => false,
				'aTargets' => [5])
			))
	->setOptions('bProcessing',true)
	->setUrl(route('manfaat.index'))
	->render()
}}


@stop