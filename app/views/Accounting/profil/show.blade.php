@extends('layouts.accounting')
@section('navbar')
@parent
@stop

@section('content')
	<h2>Showing {{ $profil->id }}</h2>
	<div class="col-md-6">
		<table class="table table-striped table-hover">
		<tbody>
			<tr><td>ID Perusahaan</td><td><strong>{{ $profil->id }}</strong></td></tr>
			<tr><td>Nama Perusahaan</td><td><strong>{{ $profil->nama_perusahaan  }}</strong></td></tr>
			<tr><td>Alamat</td><td><strong>{{ $profil->alamat }}</strong></td></tr>
			<tr><td>Telpon</td><td><strong>{{ $profil->telpon }}</strong></td></tr>
			<tr><td>Fax</td><td><strong>{{ $profil->fax }}</strong></td></tr>
			<tr><td>Email</td><td><strong>{{ $profil->email }}</strong></td></tr>
			<tr><td>Website</td><td><strong>{{ $profil->website }}</strong></td></tr>
			<tr><td>Ketua</td><td><strong>{{ $profil->ketua }}</strong></td></tr>
			<tr><td>Manager</td><td><strong>{{ $profil->manager }}</strong></td></tr>
		</tbody>
		</table>
		<a class="btn btn-primary btn-sm" href="{{ URL::to('profil') }}">Go Back</a>
	</div>	
@stop