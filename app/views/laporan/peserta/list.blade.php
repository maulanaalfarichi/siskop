@extends('layouts.laporan')
@section('navbar')
@parent
@stop

@section('content')
<p>
<h2>Induk Koperasi Perusahaan Air Minum Seluruh Indonesia</h2>
Jl. Batu Ampar 1 No. 45 A Condet - Jakarta Timur<br>
<u>Telp.021 - 808 824 21 / Fak. 021 - 808 713 21</u>
</p>
<br><br>
<label>Masa Evaluasi : </label> Desember 2014<br>
<label>Usia Pensiun Normal :</label>672 Bulan / 56 Tahun<br><br>

<table class="table table-bordered">
<thead>
	<tr>
		<th>NO.</th><th>NOMOR<BR>PESERTA</th><th>NAMA PESERTA</th><th>TANGGAL<br>LAHIR</th>
		<th>PAKET<br>PROGRAM</th><th>TM PESERTA</th><th>STATUS</th><th>USIA SAAT<br>INI<br>(dlm tahun)</th>
		<th>USIA SAAT<br>INI<br>(dlm bln)</th><th>PROYEKSI MASA<br>KEPESERTAAN S/D<br>PENSIUN</th>
		<th>MASA<br>KEPESERTAAN<br>SAAT INI(dalam<br>BULAN)</th><th>SISA MASA<br>KEPESERTAAN<br>(dalam bulan)</th>
		<th>NILAI TUNAI<th><th>STATUS</th><th>NAMA PDAM</th>
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
		<td>usia saat ini</td>
		<td>usia saat ini</td>
		<td>proyeksi masa</td>
		<td>kepesertaan s/d pensiun</td>
		<td>masa kepesertaan</td>
		<td>sisa masa kepesertaan</td>
		<td>nilai tunai</td>
		<td>{{ $value->status->keterangan }}</td>
		<td>{{ $value->pdam->nama_pdam }}</td>
	</tr>
@endforeach
</tbody>
</table>

@stop