@extends('layouts.adminlte')

@section('navbar')

@parent

@stop

@section('content')

<div class="row">
	<div class="col-lg-3 col-xs-6">
		<div class="small-box bg-aqua">
			<div class="inner">
				<h3> 150 </h3>
				<p> New Orders </p>
			</div>
			<div class="icon">
				<i class="ion ion-bag"></i>
			</div>
			<a class="small-box-footer" href="#">
			More info
			<i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<div class="small-box bg-green">
			<div class="inner">
				<h3> 53% </h3>
				<p> Bounce Rate </p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a class="small-box-footer" href="#">
			Bounce Rate
			<i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3> 44 </h3>
				<p> User Registration </p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a class="small-box-footer" href="#">
			User Registration
			<i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<div class="small-box bg-red">
			<div class="inner">
				<h3> 65 </h3>
				<p> Pie Graph </p>
			</div>
			<div class="icon">
				<i class="ion ion-pie-graph"></i>
			</div>
			<a class="small-box-footer" href="#">
			Pie Graph
			<i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
</div>

@stop