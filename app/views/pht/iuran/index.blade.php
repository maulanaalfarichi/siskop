@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')

<h2>View All Payment</h2><br>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

{{ HTML::ul($errors->all()) }}

{{ 	Datatable::table()
	->addColumn('id_peserta','cicilan_ke','iuran','tanggal bayar','status','Action')
	->setOptions('aoColumnDefs',array(
			array(
				'bVisible' => 'id_peserta' ,
				'aTargets' => [0]),
			array(
				'bVisible' => 'cicilan_ke',
				'aTargets' => [1]),
			array(
				'bVisible' => 'iuran',
				'aTargets' => [2]),
			array(
				'bVisible' => 'tanggal_bayar',
				'aTargets' => [3]),
			array(
				'bVisible' => 'status',
				'aTargets' => [4]),
			array(
				'bSortable' => false,
				'aTargets' => [5])
			))
	->setOptions('bProcessing',true)
	->setUrl(route('iuran.index'))
	->render()
}}


@stop