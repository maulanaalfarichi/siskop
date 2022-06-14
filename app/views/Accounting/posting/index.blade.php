@extends('layouts.accounting')
@section('navbar')
@parent
@stop

@section('content')

<h2>View All Posting</h2><br>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

<a class="btn btn-primary btn-sm" href="{{ URL::to('posting/create') }}">Create New</a><br><br>

{{ 	Datatable::table()
	->addColumn('Tanggal','Debet','Kredit','Action')
	->setOptions('aoColumnDefs',array(
			array(
				'bVisible' => 'ID' ,
				'aTargets' => [0]),
			array(
				'bVisible' => 'Debet',
				'aTargets' => [1]),
			array(
				'bVisible' => 'Kredit',
				'aTargets' => [2]),
			array(
				'bSortable' => false,
				'aTargets' => [3])
			))
	->setOptions('bProcessing',true)
	->setUrl(route('posting.index'))
	->render()
}}

@stop