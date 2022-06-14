@extends('layouts.accounting')
@section('navbar')
@parent
@stop

@section('content')

<h2>View All Jurnal Umum</h2><br>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

<a class="btn btn-primary btn-sm" href="{{ URL::to('jurnalumum/create') }}">Create New</a><br><br>

{{ 	Datatable::table()
	->addColumn('No Bukti','Tanggal','Keterangan','Total Debet','Total Kredit','Action')
	->setOptions('aoColumnDefs',array(
			array(
				'bVisible' => 'No Bukti' ,
				'aTargets' => [0]),
			array(
				'bVisible' => 'Tanggal',
				'aTargets' => [1]),
			array(
				'bVisible' => 'Keterangan',
				'aTargets' => [2]),
			array(
				'bVisible' => 'Total Debet',
				'aTargets' => [3],
				'sClass' => 'dt-right'),
			array(
				'bVisible' => 'Total Kredit',
				'aTargets' => [4]),
				'sClass' => 'dt-right',
			array(
				'bSortable' => false,
				'aTargets' => [5])
			))
	->setOptions('bProcessing',true)
	->setUrl(route('jurnalumum.index'))
	->render()
}}

@stop