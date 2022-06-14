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
            From
            <address>
            <strong>Induk Koperasi Perusahaan Air Minum Seluruh Indonesia</strong><br>
            Jl. Batu Ampar 1 No. 45 A Condet - Jakarta Timur<br>
            Phone: (021) 808-824-21<br/>
			Fax : (021) 808-713-21<br/>
            Email: inkoppamsi@gmail.com
            </address>
			Masa Evaluasi : {{ date('M Y') }}<br/>
			Usia Pensiun Normal : 672 / 56 Tahun
		</div>		
        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
							<th>Nomor Peserta</th>
							<th>Nama</th>
							<th>Tgl Lahir</th>
							<th>Paket Program</th>
							<th>Tgl Masuk</th>
							<th>Status</th>
							<th>Usia saat ini (thn)</th>
							<th>Usia saat ini (bln)</th>
							<th>Proyeksi masa kepesertaan s/d pensiun</th>
							<th>Masa kepesertaan saat ini (bulan)</th>
							<th>Sisa masa kepesertaan(bulan)</th>
							<th>Nilai tunai</th>
							<th>Status</th>
							<th>PDAM</th>
                        </tr>
                    </thead>
                    <tbody>
					@foreach($peserta as $key => $value)
						<tr>
							<td>{{ $no++ }}</td>
							<td>{{ $value->id_peserta }}</td>
							<td>{{ $value->nama_peserta }}</td>
							<td>{{ date('d M Y',strtotime($value->tanggal_lahir)) }}</td>
							<td>{{ $value->paket->nama_paket }}</td>
							<td>{{ date('d M Y',strtotime($value->tanggal_masuk)) }}</td>
							<td>{{ $value->status->keterangan }}</td>
							<?php 
								$tgl =date('d-m-Y',strtotime($value->tanggal_lahir));
								$umur=floor(time()-strtotime($tgl))/(60*60*24*365);
								$tgl_kepesertaan = date('d-m-Y',strtotime($value->tanggal_masuk));
								$masa_kepesertaan = floor(time()-strtotime($tgl_kepesertaan))/(60*60*24*365); 
							?>
							<td>{{ number_format($umur,0,'.',',') }}</td>
							<td>{{ number_format($umur*12,0,'.',',') }}</td>
							<td>{{ number_format(56-$umur,0,'.',',') }}</td>
							<td>{{ number_format($masa_kepesertaan*12,0,'.',',') }}</td>
							<td>{{ number_format(672-($masa_kepesertaan*12),0,'.',',') }}</td>
							<td>nilai tunai</td>
							<td>{{ $value->status->keterangan }}</td>
							<td>{{ $value->pdam->nama_pdam }}</td>
						</tr>
					@endforeach
                    </tbody>
                </table>
            </div><!-- /.col -->
        </div><!-- /.row --><br><br><Br>
		<div class="row">
			<div class="col-sm-4">
				Diketahui Oleh,<br><br><Br><br>
				<u>H.Agustan, SE</u><br>
				Ketua Umum					
			</div>
			<div class="col-sm-4">
				Dibuat Oleh,<br><br><Br><br>
				<u>Tyas Anggara Jati</u><br>
				Adm PHT		
			</div>
			<div class="col-sm-4 pull-right">
				Jakarta, {{ date('d M Y') }}<br>
				Diperiksa Oleh,<br><br><Br><br>
				<u>Suwarno</u><br>
				Manager					
			</div>
		</div>
        <div class="row no-print">
            <div class="col-xs-12">
                <button class="btn btn-success" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                <a class="btn btn-primary" style="margin-right: 5px;" href="{{ URL::to('laporanpeserta') }}"><i class="fa fa-undo"></i> Back</a>
            </div>
        </div>
	</div>
</section><!-- /.content -->
@stop