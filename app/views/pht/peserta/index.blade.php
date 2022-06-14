@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')

<h2>View All Peserta</h2><br>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

<a class="btn btn-primary btn-sm" href="{{ URL::to('peserta/create') }}">Create New</a><br><br>

{{ 	Datatable::table()
	->addColumn('id_peserta','nama_peserta','id_paket','tanggal_lahir','id_pdam','id_status','Action')
	->setOptions('aoColumnDefs',array(
			array(
				'bVisible' => 'id_peserta' ,
				'aTargets' => [0]),
			array(
				'bVisible' => 'nama_peserta' ,
				'aTargets' => [1]),
			array(
				'bVisible' => 'id_paket',
				'aTargets' => [2]),
			array(
				'bVisible' => 'tanggal_lahir',
				'aTargets' => [3]),
			array(
				'bVisible' => 'id_pdam',
				'aTargets' => [4]),
			array(
				'bVisible' => 'id_status',
				'aTargets' => [5]),
			array(
				'bSortable' => false,
				'aTargets' => [6])
			))
	->setOptions('bProcessing',true)
	->setUrl(route('peserta.index'))
	->render()
}}

@stop