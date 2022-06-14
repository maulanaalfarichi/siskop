@extends('layouts.usp')
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
            <H2>LAPORAN PINJAMAN</h2><br>
		</div>		
        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
							<th>Tanggal Pinjam </th>
							<th>ID Anggota</th>
							<th>Keterangan</th>
							<th>Jangka Waktu</th>
							<th>Pinjaman</th>
							<th>Jml Angs</th>
							<th>Angsuran</th>
							<th>Sisa Angsuran</th>
							<th>Sisa Cicilan</th>
                        </tr>
                    </thead>
                    <tbody>
					@foreach($data as $key => $value)
						<tr>							
							<td>{{ $value->id }}</td>
							<td>{{ date('d M Y',strtotime($value->tanggal_pinjam)) }}</td>
							<td>{{ $value->id_anggota }}</td>
							<td>{{ $value->keterangan }}</td>
							<td>{{ $value->jangka_waktu }}</td>
							<td>{{ number_format($value->maksimum_pembiayaan,2,',','.') }}</td>
							<td>{{ $value->jml_angsuran }}</td>
							<td>{{ number_format($value->total_angsuran,2,',','.') }}</td>
							<td>{{ $value->jml_sisa_cicilan }}</td>
							<td>{{ number_format($value->total_sisa_cicilan,2,',','.') }}</td>
						</tr>
					@endforeach
                    </tbody>
                </table>
            </div><!-- /.col -->
        </div><!-- /.row -->
		
        <div class="row no-print">
            <div class="col-xs-12">
                <button class="btn btn-success" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                <a class="btn btn-primary" style="margin-right: 5px;" href="{{ URL::to('lappinjaman') }}"><i class="fa fa-undo"></i> Back</a>
            </div>
        </div>
	</div>
</section><!-- /.content -->
@stop