@extends('layouts.accounting')
@section('navbar')
@parent
@stop

@section('content')

<h2>View All Golongan</h2><br>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

<a class="btn btn-primary btn-sm" href="{{ URL::to('golongan/create') }}">Create New</a><br><br>

{{ 	Datatable::table()
	->addColumn('ID','Nama Golongan','Action')
	->setOptions('aoColumnDefs',array(
			array(
				'bVisible' => 'ID' ,
				'aTargets' => [0]),
			array(
				'bVisible' => 'Nama Golongan',
				'aTargets' => [1]),
			array(
				'bSortable' => false,
				'aTargets' => [2])
			))
	->setOptions('bProcessing',true)
	->setUrl(route('golongan.index'))
	->render()
}}

@stop