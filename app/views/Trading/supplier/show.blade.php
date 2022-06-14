@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
	<h2>Showing {{ $supplier->id }}</h2>
	<div class="jumbotron text-center">
		<p>
			<strong>Nama Supplier : </strong>{{ $supplier->nama_supplier }}<br>
			<strong>Kota : </strong>{{ $supplier->kota }}<br>
			<strong>Contact : </strong>{{ $supplier->contact }}<br>
			<strong>Telpon : </strong>{{ $supplier->telpon }}<br>
			<strong>Produk : </strong>{{ $supplier->produk }}<br>
			<strong>Email : </strong>{{ $supplier->email }}<br><br>
			<a class="btn btn-primary btn-sm" href="{{ URL::to('supplier') }}">Go Back</a>
		</p>
	</div>
@stop