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
                                <i class="fa fa-globe"></i> Peserta {{ $peserta->id_peserta }}
                                <small class="pull-right">Date: {{ date('d M Y') }}</small>
                            </h2>
                        </div><!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            <strong>ID Peserta : </strong>{{ $peserta->id_peserta }}<br>
							<strong>Nama Peserta : </strong>{{ $peserta->nama_peserta }}<br>
							<strong>Tempat Lahir : </strong>{{ $peserta->tempat_lahir }}<br>
							<strong>Tanggal Lahir : </strong>{{ date('d M Y',strtotime($peserta->tanggal_lahir)) }}<br>
							<strong>Jenis Kelamin : </strong>{{ $peserta->jenis_kelamin }}<br>
							<strong>Alamat : </strong>{{ $peserta->alamat }}<br><br>
                        </div><!-- /.col -->
						<div class="col-sm-4 invoice-col">
                            <strong>Telpon : </strong>{{ $peserta->telpon }}<br>
							<strong>Handphone : </strong>{{ $peserta->handphone }}<br>
							<strong>Nama PDAM : </strong>{{ $peserta->pdam->nama_pdam }}<br>
							<strong>Paket PHT : </strong>{{ $peserta->paket->nama_paket }}<br>
							<strong>Tanggal Masuk : </strong>{{ date('d M Y',strtotime($peserta->tanggal_masuk)) }}<br>
							<strong>Tanggal Berhenti : </strong>{{ date('d M Y',strtotime($peserta->tanggal_berhenti)) }}<br><br>			
                        </div><!-- /.col -->
						<div class="col-sm-4 invoice-col">
                            <strong>Tanggal Proses : </strong>{{ date('d M Y',strtotime($peserta->tanggal_proses)) }}<br>
							<strong>Nama Ahli Waris : </strong>{{ $peserta->nama_ahli_waris }}<br>
							<strong>Nama Bank : </strong>{{ $peserta->bank->nama_bank }}<br>
							<strong>Nomor Rekening : </strong>{{ $peserta->nomor_rekening }}<br>
							<strong>Atas Nama : </strong>{{ $peserta->atas_nama }}<br>
							<strong>Status : </strong>{{ $peserta->status->keterangan }}<br><br>
						</div><!-- /.col -->
                    </div><!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Cicilan Ke-</th>
                                        <th>Iuran</th>
                                        <th>Tanggal Bayar</th>
                                        <th>Status</th>
										<th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
								@foreach($iuran as $key => $value )
                                    <tr>
                                        <td>{{ $value->cicilan_ke }}</td>
                                        <td>{{ number_format($value->iuran,2,'.',',') }}</td>
										<td>{{ date('d M Y',strtotime($value->tanggal_bayar)) }}</td>
                                        <td>{{ $value->status }}</td>
                                        <td>{{ $value->keterangan }}</td>
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
                            <a class="btn btn-primary pull-right" style="margin-right: 5px;" href="{{ URL::to('peserta') }}"><i class="fa fa-undo"></i> Back</a>
                        </div>
                    </div>
                </section><!-- /.content -->

@stop