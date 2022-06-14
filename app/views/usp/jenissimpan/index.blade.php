@extends('layouts.usp')
@section('navbar')
@parent
@stop

@section('content')

<h2>View All Jenis Simpan</h2><br>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

<a class="btn btn-primary btn-sm" href="{{ URL::to('jenissimpanan/create') }}">Create New</a><br><br>

{{ 	Datatable::table()
	->addColumn('id','jenis_simpanan','jumlah','Action')
	->setOptions('aoColumnDefs',array(
			array(
				'bVisible' => 'id' ,
				'aTargets' => [0]),
			array(
				'bVisible' => 'jenis_simpanan' ,
				'aTargets' => [1]),
			array(
				'bVisible' => 'jumlah' ,
				'aTargets' => [2]),
			array(
				'bSortable' => false,
				'aTargets' => [3])
			))
	->setOptions('bProcessing',true)
	->setUrl(route('jenissimpanan.index'))
	->render()
}}

@stop