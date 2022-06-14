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
            <H2>LAPORAN SIMPANAN S/D {{ date('d M Y',strtotime($data->first()->tanggal_simpanan)) }}</h2><br>
		</div>		
        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
							<th>tanggal Simpan </th>
							<th>ID Anggota</th>
							<th>Nama Anggota</th>
							<th>ID Jenis</th>
							<th>Jenis</th>
							<th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
					@foreach($data as $key => $value)
						<tr>							
							<td>{{ $value->id }}</td>
							<td>{{ date('d M Y',strtotime($value->tanggal_simpanan)) }}</td>
							<td>{{ $value->id_anggota }}</td>
							<td>{{ $value->anggota->nama_anggota }}</td>
							<td>{{ $value->id_anggota }}</td>
							<td>{{ $value->jenissimpan->jenis_simpanan }}</td>
							<td>{{ number_format($value->jumlah,2,',','.') }}</td>
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