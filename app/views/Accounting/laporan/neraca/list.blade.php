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
            <small class="pull-right">Date: {{ date('d M Y') }}</small>
            </h2>
        </div><!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info" id="report">
        <div class="col-xs-12 invoice-col">
		@foreach($profil as $key =>$value )
			{{ $value->nama_perusahaan }}<br>
			{{ $value->alamat }}<br>
			Telp : {{ $value->telpon }} / Fax : {{ $value->fax }}
		@endforeach
		<br><br><br>
		<p align="center">NERACA<br>Per : {{ date('d F Y',strtotime($tanggal)) }} dan Per {{ date('d F Y',strtotime('-1 month',strtotime($tanggal))) }}  </p>
		</div>
        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr style="background-color:#000;color:#fff">
							<th colspan="2" style="text-align:center">URAIAN</th>
							<th style="text-align:center">CAT</th>
							<th style="text-align:center">{{ date('d F Y',strtotime($tanggal)) }}</th>
							<th style="text-align:center">{{ date('d F Y',strtotime('-1 month',strtotime($tanggal))) }}</th>
                        </tr>
						<tr style="background-color:#000;color:#fff;">
							<th colspan="5" style="text-align:center">AKTIVA</th>
						</tr>
                    </thead>
                    <tbody>
					<?php 
						function cari($tanggal,$id_golongan){
							$data = DB::table('v_neraca_fix')->where('tahun','=',date('Y',strtotime(Input::get('$tanggal'))))
											->where('bln','=',date('m',strtotime(Input::get('$tanggal'))))
											->where('id_golongan','=',$id_golongan)->get();	
							return $data;
						}
					?>
						<tr><td colspan="2">AKTIVA LANCAR</td></tr>
						<tr><td></td><td>Kas & Bank</td><td>11</td><td></td><td></td></tr>
						<tr><td></td><td>Simpanan Jangka Pendek</td><td>12</td><td></td><td></td></tr>
						<tr><td></td><td>Piutang Pinjaman Anggota</td><td>14</td><td></td><td></td></tr>
						<tr><td></td><td>Piutang Pinjaman Non Anggota</td><td>15</td><td></td><td></td></tr>
						<tr><td></td><td>Piutang Lain lain</td><td>16</td><td></td><td></td></tr>
						<tr><td></td><td>Peyisihan piutang tak tertagih</td><td>17</td><td></td><td></td></tr>
						<tr><td></td><td>Persediaan Barang</td><td>18</td><td></td><td></td></tr>
						<tr><td></td><td>Biaya dibayar Dimuka</td><td>19</td><td></td><td></td></tr>
						<tr><td></td><td><strong>Jumlah Aktiva Lancar</strong></td><td></td><td>Rp.</td><td>Rp.</td></tr>
					    
						<tr><td colspan="2">AKTIVA TETAP</td></tr>
						<tr><td></td><td>Tanah</td><td>20</td><td></td><td></td></tr>
						<tr><td></td><td>Bangunan</td><td>21</td><td></td><td></td></tr>
						<tr><td></td><td>Kendaraan</td><td>22</td><td></td><td></td></tr>
						<tr><td></td><td>Peralatan Kantor & AsGross</td><td>23</td><td></td><td></td></tr>
						<tr><td></td><td>Perabotan Kantor</td><td>24</td><td></td><td></td></tr>
						<tr><td></td><td>Akuml. Penyusutan Aset Tetap</td><td>25</td><td></td><td></td></tr>
						<tr><td></td><td><strong>Jumlah Aktiva Tetap</strong></td><td></td><td>Rp.</td><td>Rp.</td></tr>
					    <tr><td>AKTIVA LAIN-LAIN</td><td></td><td>26</td><td></td><td></td></tr>
						<tr><td>TOTAL AKTIVA</td><td></td><td>26</td><td></td><td></td></tr>
						
						<tr style="background-color:#000;color:#fff;">
							<th colspan="5" style="text-align:center">KEWAJIBAN DAN EKUITAS </th>
						</tr>
						<tr><td colspan="2">KEWAJIBAN JANGKA PENDEK</td></tr>
						<tr><td></td><td>Hutang Usaha</td><td>27</td><td></td><td></td></tr>
						<tr><td></td><td>Pendapatan diterima Dimuka</td><td>28</td><td></td><td></td></tr>
						<tr><td></td><td>Pendapatan ditangguhkan</td><td>29</td><td></td><td></td></tr>
						<tr><td></td><td>Hutang Supplier</td><td>30</td><td></td><td></td></tr>
						<tr><td></td><td>Hutang Pajak</td><td>31</td><td></td><td></td></tr>
						<tr><td></td><td>Hutang Lain lain</td><td>32</td><td></td><td></td></tr>
						<tr><td></td><td><strong>Jumlah Kewajiban Jangka Panjang</strong></td><td></td><td>Rp.</td><td>Rp.</td></tr>
					    <tr><td colspan="2">KEWAJIBAN JANGKA PANJANG</td></tr>
						<tr><td></td><td>Hutang Bank Jangka Panjang</td><td>33</td><td></td><td></td></tr>
						<tr><td></td><td>Hutang Program Hari Tua Plus</td><td>34</td><td></td><td></td></tr>
						<tr><td></td><td><strong>Jumlah Kewajiban Jangka Panjang</strong></td><td></td><td>Rp.</td><td>Rp.</td></tr>
					    <tr><td colspan="2">EKUITAS</td></tr>
						<tr><td></td><td>Simpanan Wajib</td><td>35</td><td></td><td></td></tr>
						<tr><td></td><td>Simpanan Pokok</td><td>36</td><td></td><td></td></tr>
						<tr><td></td><td>Modal Sumbangan</td><td>37</td><td></td><td></td></tr>
						<tr><td></td><td>Saldo Laba (Rugi) Tahun Lalu</td><td>38</td><td></td><td></td></tr>
						<tr><td></td><td>Saldo Laba (Rugi) Tahun Berjalan</td><td>39</td><td></td><td></td></tr>
						<tr><td></td><td><strong>Jumlah Ekuitas</strong></td><td></td><td>Rp.</td><td>Rp.</td></tr>
					    <tr><td>TOTAL KEWAJIBAN DAN EKUITAS</td><td></td><td>26</td><td></td><td></td></tr>

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