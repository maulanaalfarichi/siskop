@extends('layouts.reporting')
@section('navbar')
@parent
@stop

@section('content')
<section class="content invoice">
<!-- title row -->
    <div class="row">
        <div class="col-sm-12">
            <h2 class="page-header">
            <!-- <i class="fa fa-globe"></i>  WEB INKOPPAMSI --> 
            <small class="pull-right">Date: {{ date('d M Y') }}</small>
            </h2>
        </div><!-- /.col -->
		<div class="row no-print">
            <div class="col-xs-12">
                <button class="btn btn-success" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
				<button class="btn btn-info" onclick="to_excel();"><i class="fa fa-print"></i> Excel</button>
                <a class="btn btn-primary" style="margin-right: 5px;" href="{{ URL::to('rugilaba') }}"><i class="fa fa-undo"></i> Back</a>
            </div>
        </div>
    </div>
    <!-- info row -->
    <div class="row invoice-info" id="report">
        <div class="col-sm-8 invoice-col">
            <H2>Rugi Laba s/d tanggal : {{ date('d M Y',strtotime($tanggal)) }}</h2><br>
		</div>		
        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
							<th>ID Rekening</th>
							<th>Saldo Awal</th>
							<th>Jan</th>
							<th>Feb</th>
                        </tr>
                    </thead>
                    <tbody>
					@foreach($data->get() as $key => $value)
						<tr>
							<td>
								<?php 
								if($value->id_klasifikasi == 1){ ?> 
									<b>{{ $value->id_rekening }} - {{ $value->nama_rekening }}</b>
								<?php
								}else if($value->id_klasifikasi == 2){ ?>
									<b>&nbsp&nbsp&nbsp{{ $value->id_rekening }} - {{ $value->nama_rekening }}</b>
								<?php
								}else if($value->id_klasifikasi >=3 ){ ?>
									&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{{ $value->id_rekening }} - {{ $value->nama_rekening }}
								<?php
								}								
								?>
							
							</td>
							<td align="right">{{ number_format($value->saldo_awal,2,'.',',') }}</td>
							<td align="right">{{ number_format($value->jan,2,'.',',') }}</td>
							<td align="right">{{ number_format($value->feb,2,'.',',') }}</td>							
						</tr>
					@endforeach
					    <tr>
							<td align="center"><b>TOTAL</b></td>
							<td align="right"><b>{{ number_format($data->sum('saldo_awal'),2,',','.') }}</b></td>
							<td align="right"><b>{{ number_format($data->sum('jan'),2,',','.') }}</b></td>
							<td align="right"><b>{{ number_format($data->sum('feb'),2,',','.') }}</b></td>
							
						</tr>
                    </tbody>
                </table>
            </div><!-- /.col -->
        </div><!-- /.row -->
		
        
	</div>
</section><!-- /.content -->
@stop