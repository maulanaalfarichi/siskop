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
                                <i class="fa fa-globe"></i> Tabel Manfaat Paket {{ $paket->id_paket }}
                                <small class="pull-right">Date: {{ date('d M Y') }}</small>
                            </h2>
                        </div><!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            ID Paket : {{ $paket->id_paket }} <br>
							Nama Paket : {{ $paket->nama_paket }} <br>
							Iuran : {{ number_format($paket->iuran,2,'.',',') }} <br>
                        </div><!-- /.col -->
						<div class="col-sm-4 invoice-col">
                            Premi : {{ number_format($paket->premi,2,'.',',') }} <br>
							Operasional : {{ number_format($paket->operasional,2,'.',',') }} <br>
							Cadangan : {{ number_format($paket->cadangan,2,'.',',') }} <br><br>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Bulan</th>
                                        <th>Manfaat</th>
                                        <th>Santunan</th>
                                        <th>Tambahan</th>
                                    </tr>
                                </thead>
                                <tbody>
								@foreach($manfaat as $key => $value )
                                    <tr>
                                        <td>{{ $value->bulan }}</td>
                                        <td>{{ number_format($value->manfaat,2,'.',',') }}</td>
                                        <td>{{ number_format($value->santunan,2,'.',',') }}</td>
                                        <td>{{ number_format($value->tambahan,2,'.',',') }}</td>
                                    </tr>
								@endforeach
                                </tbody>
                            </table>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    
                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-xs-12">
                            <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                            <a class="btn btn-primary pull-right" style="margin-right: 5px;" href="{{ URL::to('paket') }}"><i class="fa fa-undo"></i> Back</a>
                        </div>
                    </div>
                </section><!-- /.content -->
@stop