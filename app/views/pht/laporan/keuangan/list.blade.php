@extends('layouts.adminlte')
@section('navbar')
@parent
@stop

@section('content')
<section class="content invoice">
<!-- title row -->
    <div class="row">
        <div class="col-sm-12">
            <h2 class="page-header">
            <i class="fa fa-globe"></i> WEB INKOPPAMSI
            <small class="pull-right">Date: {{ date('d M Y') }}</small>
            </h2>
        </div><!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-8 invoice-col">
            <H2>LAPORAN PROGRAM HARI TUA PLUS<br>BULAN {{ $bln_thn }}</h2><br>
		</div>		
        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
							<th></th>
							<th></th>
							<th></th>
							<th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
						<tr>
							<td>I.</td>
							<td>
								<ul><li>Penerimaan Iuran
									<ul>
										<li>1.1. Penerimaan Iuran seharusnya berdasarkan data peserta</li>
										<li>1.2. Realisasi Penerimaan
											<ul>
												<li>a. Bank Rakyat Indonesia (BRI)</li>
												<li>b. Bank Mandiri</li>
											</ul>
										</li>
									</ul>
							    </li></ul>
							</td>
							<td></td>
							<td></td>
							<td></td>							
						</tr>
						
						<tr>
							<td>II.</td>
							<td>
								<ul><li>Piutang Iuran s/d {{ substr($bln_thn,3,4) }} 
									<ul>
										<li>1.1. Piutang iuran per - {{ $bln_thn }}</li>
										<li>1.2. Piutang Iuran s/d Oktober {{ $bln_thn }}</li>
									</ul>
							    </li></ul>
							</td>
							<td></td>
							<td></td>
							<td></td>							
						</tr>
						
						<tr>
							<td>III.</td>
							<td>
								<ul><li>Kewajiban
									<ul>
										<li>1.1. Cadangan Dana Nilai Tunai PHT Plus
											<ul>
												<li>a. Cadangan Dana Per {{ $bln_thn }}</li>
												<li>b. Cadangan Dana s/d {{ $bln_thn }}</li>
											</ul>
										</li>
										<li>1.2. Cadangan dana Santunan Uang Duka
											<ul>
												<li>a. Cadangan Dana per {{ $bln_thn }}</li>
												<li>b. Cadangan dana s/d  {{ $bln_thn }}</li>
											</ul>
										</li>
										<li>1.3. Beban Bunga Cadangan</li>
									</ul>
							    </li></ul>
							</td>
							<td></td>
							<td></td>
							<td></td>							
						</tr>
						
						<tr>
							<td>IV.</td>
							<td>
								<ul><li>Pembayaran Manfaat
									<ul>
										<li>1.1. Pembayaran Manfaat Nilai Tunai
											<ul>
												<li>a. Pembayaran Manfaat Nilai Tunai peserta aktif</li>
												<li>b. Pembayaran Manfaat dari Hutang pembayaran manfaat</li>
											</ul>
										</li>
										<li>1.2. Pembayaran Manfaat Santunan Uang Duka
											<ul>
												<li>a. Pembayaran Manfaat Santunan Uang Duka Peserta Aktif</li>
												<li>b. Pembayaran Manfaat Santunan Uang Duka Seumur Hidup</li>
											</ul>
										</li>
										<li>1.3. Pembayaran Manfaat Tambahan</li>
									</ul>
							    </li></ul>
							</td>
							<td></td>
							<td></td>
							<td></td>							
						</tr>
						<tr>
							<td>IV.</td>
							<td>
								<ul><li>Pembayaran Manfaat</I></UL>
							</td>
							<td></td>
							<td></td>
							<td></td>							
						</tr>
                    </tbody>
                </table>
            </div><!-- /.col -->
        </div><!-- /.row -->
		
        <div class="row no-print">
            <div class="col-xs-12">
                <button class="btn btn-success" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                <a class="btn btn-primary" style="margin-right: 5px;" href="{{ URL::to('laporankeuanganpht') }}"><i class="fa fa-undo"></i> Back</a>
            </div>
        </div>
	</div>
</section><!-- /.content -->
@stop