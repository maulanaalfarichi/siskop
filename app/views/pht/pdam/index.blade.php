@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')

<h2>View All PDAM</h2><br>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

<a class="btn btn-primary btn-sm" href="{{ URL::to('pdam/create') }}">Create New</a><br><br>

{{ 	Datatable::table()
	->addColumn('id_pdam','nama_pdam','telpon','fax','Action')
	->setOptions('aoColumnDefs',array(
			array(
				'bVisible' => 'id_pdam' ,
				'aTargets' => [0]),
			array(
				'bVisible' => 'nama_pdam' ,
				'aTargets' => [1]),
			array(
				'bVisible' => 'telepon',
				'aTargets' => [2]),
			array(
				'bVisible' => 'fax',
				'aTargets' => [3]),
			array(
				'bSortable' => false,
				'aTargets' => [4])
			))
	->setOptions('bProcessing',true)
	->setUrl(route('pdam.index'))
	->render()
}}

@stop