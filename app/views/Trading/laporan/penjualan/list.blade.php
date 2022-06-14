@extends('layouts.laporan')
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
            <H2>LAPORAN PENJUALAN S/D </h2><br>
		</div>		
        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
							<th>tanggal Penjualan </th>
							<th>Pelanggan</th>
							<th>Ekspedisi</th>
							<th>Jumlah</th>
							<th>Diskon</th>
							<th>Ongkir</th>
							<th>PPN</th>
							<th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
					@foreach($data as $key => $value)
						<tr>							
							<td>{{ $value->id }}</td>
							<td>{{ date('d M Y',strtotime($value->tanggal_penjualan)) }}</td>
							<td>{{ $value->nama_pelanggan }}</td>
							<td>{{ $value->nama }}</td>
							<td>{{ number_format($value->jumlah,2,',','.') }}</td>
							<td>{{ number_format($value->diskon,2,',','.') }}</td>
							<td>{{ number_format($value->ongkos_kirim,2,',','.') }}</td>
							<td>{{ number_format($value->ppn,2,',','.') }}</td>
							<td>{{ number_format($value->total,2,',','.') }}</td>
						</tr>
					@endforeach
                    </tbody>
                </table>
            </div><!-- /.col -->
        </div><!-- /.row -->
		
        <div class="row no-print">
            <div class="col-xs-12">
                <button class="btn btn-success" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                <a class="btn btn-primary" style="margin-right: 5px;" href="{{ URL::to('lapsimpanan') }}"><i class="fa fa-undo"></i> Back</a>
            </div>
        </div>
	</div>
</section><!-- /.content -->
@stop