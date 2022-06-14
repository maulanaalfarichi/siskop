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
            <i class="fa fa-globe"></i> WEB INKOPPAMSI
            <small class="pull-right">Date: {{ date('d M Y') }}</small>
            </h2>
        </div><!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info" id="report">
        <div class="col-sm-8 invoice-col">
            <H2>Neraca Percobaan</h2><br>
		</div>		
        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th rowspan="2">ID Rekening</th>
							<th rowspan="2">Nama Rekening</th>
							<th colspan="2" style="text-align:center">Awal</th>
							<th colspan="2" style="text-align:center">Mutasi</th>
							<th colspan="2" style="text-align:center">Sisa</th>
                        </tr>
						<tr>
							<th>Debet</th>
							<th>Kredit</th>
							<th>Debet</th>
							<th>Kredit</th>
							<th>Debet</th>
							<th>Kredit</th>
						</tr>
                    </thead>
                    <tbody>
					@foreach($data->get() as $key => $value)
						<tr>
							<td>{{ $value->id_rekening }}</td>
							<td>{{ $value->nama_rekening }}</td>
							<td align="right">{{ number_format($value->saldo_awal_debet,2,'.',',') }}</td>
							<td align="right">{{ number_format($value->saldo_awal_kredit,2,'.',',') }}</td>			
							<td align="right">{{ number_format($value->saldo_mutasi_debet,2,'.',',') }}</td>
							<td align="right">{{ number_format($value->saldo_mutasi_kredit,2,'.',',') }}</td>			
							<td align="right">{{ number_format($value->sisa_debet,2,'.',',') }}</td>
							<td align="right">{{ number_format($value->sisa_kredit,2,'.',',') }}</td>
						</tr>
					@endforeach
					    <tr>
							<td colspan="2" align="center"><b>TOTAL TRANSAKSI</b></td>
							<td align="right"><b>{{ number_format($data->sum('saldo_awal_debet'),2,',','.') }}</b></td>
							<td align="right"><b>{{ number_format($data->sum('saldo_awal_kredit'),2,',','.') }}</b></td>
							<td align="right"><b>{{ number_format($data->sum('saldo_mutasi_debet'),2,',','.') }}</b></td>
							<td align="right"><b>{{ number_format($data->sum('saldo_mutasi_kredit'),2,',','.') }}</b></td>
							<td align="right"><b>{{ number_format($data->sum('sisa_debet'),2,',','.') }}</b></td>
							<td align="right"><b>{{ number_format($data->sum('sisa_kredit'),2,',','.') }}</b></td>
						</tr>
                    </tbody>
                </table>
            </div><!-- /.col -->
        </div><!-- /.row -->
		
        <div class="row no-print">
            <div class="col-xs-12">
                <button class="btn btn-success" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
				<button class="btn btn-info" onclick="to_excel();"><i class="fa fa-print"></i> Excel</button>
                <a class="btn btn-primary" style="margin-right: 5px;" href="{{ URL::to('bukujurnal') }}"><i class="fa fa-undo"></i> Back</a>
            </div>
        </div>
	</div>
</section><!-- /.content -->
@stop