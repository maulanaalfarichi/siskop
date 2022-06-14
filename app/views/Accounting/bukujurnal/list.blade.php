@extends('layouts.accounting')
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
            <H2>Buku Jurnal</h2><br>
		</div>		
        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
							<th>Nomor Bukti</th>
							<th>ID Rekening</th>
							<th>Keterangan</th>
							<th>Debet</th>
							<th>Kredit</th>
                        </tr>
                    </thead>
                    <tbody>
					@foreach($jurnaldetail as $key => $value)
						<tr>
							<td>{{ $value->tanggal }}</td>
							<td>{{ $value->no_bukti }}</td>
							<td>{{ $value->id_rekening }}</td>
							<td>{{ $value->keterangan }}</td>
							<td>{{ number_format($value->debet,2,'.',',') }}</td>
							<td>{{ number_format($value->kredit,2,'.',',') }}</td>						
						</tr>
					@endforeach
                    </tbody>
                </table>
            </div><!-- /.col -->
        </div><!-- /.row -->
		
        <div class="row no-print">
            <div class="col-xs-12">
                <button class="btn btn-success" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                <a class="btn btn-primary" style="margin-right: 5px;" href="{{ URL::to('laporantunggakan') }}"><i class="fa fa-undo"></i> Back</a>
            </div>
        </div>
	</div>
</section><!-- /.content -->
@stop