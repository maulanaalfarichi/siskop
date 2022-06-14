@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
	<!-- Main content -->
                <section class="content invoice">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="page-header">
                                <i class="fa fa-globe"></i> WEB INKOP PAMSI
                                <small class="pull-right">Date: {{ date('d M Y') }}</small>
                            </h2>
                        </div><!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            <strong>Laporan Rekening Koran PHT - Plus</strong><br>
							<strong>{{ $bln_thn }}</strong><br><br>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">Nama PDAM</th>
										<th colspan="2">BRI</th>
										<th colspan="2">MANDIRI</th>
                                    </tr>
									<tr>
										<th>Jumlah Pembayaran</th>
										<th>Tanggal Pembayaran</th>
										<th>Jumlah Pembayaran</th>
										<th>Tanggal Pembayaran</th>
									</tr>
                                </thead>
                                <tbody>
								@foreach($data as $key =>$value )
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $value['nama_pdam'] }}</td>
										<td>{{ $value['bri_pay'] }}</td>
										<td>{{ $value['bri_date'] }} </td>
										<td>{{ $value['mandiri_pay'] }}</td>
										<td>{{ $value['mandiri_date'] }} </td>
                                    </tr>
									<?php $no++; ?>
								@endforeach
                                </tbody>
								<tfooter>
									<tr>
										<td colspan="2">JUMLAH</td>
										<td>{{ number_format($bri_total,2,',','.') }}</td><td></td>
										<td>{{ number_format($mandiri_total,2,',','.') }}</td><td></td>
									</tr>
								</tfooter>
                            </table>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    
                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-xs-12">
                            <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                            <a class="btn btn-primary pull-right" style="margin-right: 5px;" href="{{ URL::to('peserta') }}"><i class="fa fa-undo"></i> Back</a>
                        </div>
                    </div>
                </section><!-- /.content -->

@stop