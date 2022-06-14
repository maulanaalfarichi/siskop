@extends('layouts.usp')
@section('navbar')
@parent
@stop

@section('content')

<h2>View All Jenis Anggota</h2><br>

@if(Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		<i class="fa fa-info"></i>
		<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
		<b>Alert!</b>
		{{ Session::get('message') }}
	</div>
@endif

<a class="btn btn-primary btn-sm" href="{{ URL::to('anggota/create') }}">Create New</a><br><br>

{{ 	Datatable::table()
	->addColumn('id','nama_anggota','jk','tempat_lahir','tanggal_lahir','alamat','hp','nama_koperasi','Action')
	->setOptions('aoColumnDefs',array(
			array(
				'bVisible' => 'id' ,
				'aTargets' => [0]),
			array(
				'bVisible' => 'nama_anggota' ,
				'aTargets' => [1]),
			array(
				'bVisible' => 'jk' ,
				'aTargets' => [2]),
			array(
				'bVisible' => 'tempat_lahir' ,
				'aTargets' => [3]),
			array(
				'bVisible' => 'tanggal_lahir' ,
				'aTargets' => [4]),
			array(
				'bVisible' => 'alamat' ,
				'aTargets' => [5]),
			array(
				'bVisible' => 'hp' ,
				'aTargets' => [6]),
			array(
				'bVisible' => 'nama_koperasi' ,
				'aTargets' => [7]),
			array(
				'bSortable' => false,
				'aTargets' => [8])
			))
	->setOptions('bProcessing',true)
	->setUrl(route('anggota.index'))
	->render()
}}

@stop