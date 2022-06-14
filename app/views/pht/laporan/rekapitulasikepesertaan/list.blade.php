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
							<strong>bulan lalu</strong><br><br>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th rowspan="2">PDAM</th>
                                        <th colspan="3" align="center">PESERTA</th>	
										<th >JUMLAH IURAN</th>
										<th colspan="4" align="center">CLAIM</th>
										<th colspan="2" align="center">PENSIUN NORMAL</th>
                                    </tr>
									<tr>
										<th>Bulan Lalu</th>
										<th>+/-</th>
										<th>Bulan Ini</th>
										<th>+/-</th>
										<th>Normal</th>
										<th>Berhenti</th>
										<th>Aktif M</th>
										<th>Seumur Hidup</th>
										<th>Saat Ini</th>
										<th>Sd Saat Ini</th>
									</tr>
                                </thead>
                                <tbody>
								@foreach($data as $key => $value)
									<tr>
										<td>{{ $value['nama_pdam'] }}</td>
										<td>{{ $value['bulan_lalu'] }}</td>
										<td>{{ $value['inc_peserta']}}</td>
										<td>{{ $value['bulan_ini']}}</td>
										<td>{{ number_format($value['inc_iuran'],2,',','.') }}</td>
										<td>{{ $value['bulan_ini']}}</td>
										<td>{{ $value['bulan_ini']}}</td>
										<td>{{ $value['bulan_ini']}}</td>
										<td>{{ $value['bulan_ini']}}</td>
										<td>{{ $value['normal_saatini']}}</td>
										<td>{{ $value['normal_sampaiini']}}</td>
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
                            <a class="btn btn-primary pull-right" style="margin-right: 5px;" href="{{ URL::to('rekapitulasikepesertaanpht') }}"><i class="fa fa-undo"></i> Back</a>
                        </div>
                    </div>
                </section><!-- /.content -->

@stop