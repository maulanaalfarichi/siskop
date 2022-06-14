@extends('layouts.usp')
@section('navbar')
@parent
@stop

@section('content')

<h2>View All Simpanan</h2><br>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

<a class="btn btn-primary btn-sm" href="{{ URL::to('simpanan/create') }}">Create New</a><br><br>

{{ 	Datatable::table()
	->addColumn('id','tanggal_simpanan','id_koperasi','nama_koperasi','jenis_simpanan','jumlah','Action')
	->setOptions('aoColumnDefs',array(
			array(
				'bVisible' => 'id' ,
				'aTargets' => [0]),
			array(
				'bVisible' => 'tanggal_simpanan' ,
				'aTargets' => [1]),
			array(
				'bVisible' => 'id_koperasi' ,
				'aTargets' => [2]),
			array(
				'bVisible' => 'nama_koperasi' ,
				'aTargets' => [3]),
			array(
				'bVisible' => 'jenis_simpanan' ,
				'aTargets' => [4]),
			array(
				'bVisible' => 'jumlah' ,
				'aTargets' => [5]),
			array(
				'bSortable' => false,
				'aTargets' => [6])
			))
	->setOptions('bProcessing',true)
	->setUrl(route('simpanan.index'))
	->render()
}}

@stop