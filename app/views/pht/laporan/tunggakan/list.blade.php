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
            <H2>Laporan Tunggakan<br>{{ $iuran->first()->peserta->pdam->nama_pdam }}</h2><br>
		</div>		
        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nomor Peserta</th>
							<th>Nama Peserta</th>
							<th>Cicilan Ke</th>
							<th>Status</th>
							<th>Iuran</th>
							<th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
					@foreach($iuran as $key => $value)
						<tr>
							<td>{{ $value->id_peserta }}</td>
							<td>{{ $value->peserta->nama_peserta }}</td>
							<td>{{ $value->cicilan_ke }}</td>
							<td>{{ $value->status }}</td>
							<td>{{ number_format($value->iuran,2,'.',',') }}</td>
							<td>{{ $value->keterangan }}</td>							
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