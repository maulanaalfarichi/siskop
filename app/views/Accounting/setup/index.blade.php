@extends('layouts.accounting')
@section('navbar')
@parent
@stop

@section('content')


<script>
$(document).ready(function(){
	function confirm(){
	r = confirm("yakin akan menghapus?");
	if(r){
		alert("eksekusi");
	}else{
		alert("gagal eksekusi");
	}
	}
});
</script>

<h2>View All Rekening</h2><br>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

<a class="btn btn-primary btn-sm" href="{{ URL::to('setup/create') }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> New</a><br><br>

{{ 	Datatable::table()
	->addColumn('ID Rekening','Nama Rekening','Saldo Awal Debet','Saldo Awal Kredit','Action')
	->setOptions('aoColumnDefs',array(
			array(
				'bVisible' => 'ID Rekening' ,
				'aTargets' => [0]),
			array(
				'bVisible' => 'Nama Rekening',
				'aTargets' => [1]),
			array(
				'bVisible' => 'Saldo Awal Debet',
				'aTargets' => [2],
				'sClass' => 'dt-body-right'),
			array(
				'bVisible' => 'Saldo Awal Kredit',
				'aTargets' => [3]),
			array(
				'bSortable' => false,
				'aTargets' => [4])
			))
	->setOptions('bProcessing',true)
	->setUrl(route('setup.index'))
	->render()
}}
@stop