@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')

<h2>View All Bank</h2><br>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

<a class="btn btn-primary btn-sm" href="{{ URL::to('bank/create') }}">Create New</a><br><br>

{{ 	Datatable::table()
	->addColumn('id_bank','nama_bank','Action')
	->setOptions('aoColumnDefs',array(
			array(
				'bVisible' => 'id_bank' ,
				'aTargets' => [0]),
			array(
				'bVisible' => 'nama_bank' ,
				'aTargets' => [1]),
			array(
				'bSortable' => false,
				'aTargets' => [2])
			))
	->setOptions('bProcessing',true)
	->setUrl(route('bank.index'))
	->render()
}}

@stop