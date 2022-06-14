@extends('layouts.accounting')
@section('navbar')
@parent
@stop

@section('content')

<h2>Detail Posting</h2><br>

<a class="btn btn-primary" href="{{ URL::to('posting') }}">Back</a><br><Br>

<table class="table table-stripped table-bordered table-hover">
<thead>
	<tr>
		<th>No.Bukti</th>
		<th>Tanggal</th>
		<th>Keterangan</th>
		<th>Debet</th>
		<th>Kredit</th>
		<th>Action</th>
	</tr>
</thead>
<tbody>
	<?php 
		$debet = 0;
		$kredit = 0;
	?>
	@foreach($data as $key => $value)
		<tr>
			<td>{{ $value->no_bukti }}</td>
			<td>{{ date('d M Y',strtotime($value->tanggal)) }}</td>
			<td>{{ $value->keterangan }}</td>
			<td align="right">{{ number_format($value->debet,2,',','.') }}</td>
			<td align="right">{{ number_format($value->kredit,2,',','.') }}</td>
			<td>
				<a class="btn btn-success btn-sm" href="{{ URL::to('posting/'.$value->no_bukti.'/edit') }}">Detail</a>
			</td>
		</tr>
		<?php 
			$debet = $debet + $value->debet;
			$kredit = $kredit + $value->kredit;
		?>
	@endforeach
	<Tr>
		<td colspan="3" align="center"><b>Total</b></td>
		<td align="right"><b>{{ number_format($debet,2,',','.') }}</b></td>
		<td align="right"><b>{{ number_format($kredit,2,',','.') }}</b></td>
	</tr>
</tbody>
</table>



@stop