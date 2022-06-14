@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')

<h2>View All Paket</h2><br>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

<a class="btn btn-primary btn-sm" href="{{ URL::to('paket/create') }}">Create New</a><br><br>

{{ 	Datatable::table()
	->addColumn('id_paket','nama_paket','iuran','premi','operasinal','cadangan','Action')
	->setOptions('aoColumnDefs',array(
			array(
				'bVisible' => 'id_paket' ,
				'aTargets' => [0]),
			array(
				'bVisible' => 'nama_paket' ,
				'aTargets' => [1]),
			array(
				'bVisible' => 'iuran',
				'aTargets' => [2]),
			array(
				'bVisible' => 'premi',
				'aTargets' => [3]),
			array(
				'bVisible' => 'operasional',
				'aTargets' => [4]),
			array(
				'bVisible' => 'cadangan',
				'aTargets' => [5]),
			array(
				'bSortable' => false,
				'aTargets' => [6])
			))
	->setOptions('bProcessing',true)
	->setUrl(route('paket.index'))
	->render()
}}


@stop