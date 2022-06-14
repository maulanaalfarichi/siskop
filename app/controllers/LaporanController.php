<?php

class LaporanController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function peserta()
	{
		$pdam = Pdam::Lists('nama_pdam','id_pdam');
		$status = Status::Lists('keterangan','id_status');
		return View::make('pht.laporan.peserta.index')->with('status',$status)
		       ->with('pdam',$pdam)->with('page','Lap.Peserta')->with('modul','Index');
	}
	
	public function tampilpeserta()
	{
		$peserta = Peserta::where('id_status','=',Input::get('id_status'))
		                  ->where('id_pdam','=',Input::get('id_pdam'))->get();
		return View::make('pht.laporan.peserta.list')->with('page','Lap.Peserta')->with('modul','Index')
		->with('peserta',$peserta)->with('no',1);
	}
	
	public function rekeningkoran()
	{
		$pdam = Pdam::Lists('nama_pdam','id_pdam');
		$status = Status::Lists('keterangan','id_status');
		return View::make('pht.laporan.rekeningkoran.index')->with('status',$status)
		       ->with('pdam',$pdam)->with('page','Lap.Rekening Koran')->with('modul','Index');
	}
	
	public function tampilrekeningkoran()
	{
		$rules = array(
			'bln_thn' => array('required','date_format:m-Y'),
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails())
		{
			return Redirect::to('rekeningkoranpht')->withErrors($validator)->withInput();
		}else{			
			$data = [];
			$footer = [];
			$bri_total = 0;
			$mandiri_total = 0;
			$pdam = PDAM::all();
			foreach($pdam as $key => $value){
				$pdam = Pdam::find($value->id_pdam);
				$peserta_id = $pdam->peserta->lists('id_peserta','id_peserta');

				$bri = Iuran::where('id_bank','=','BRI')->where('status','=','LUNAS')
				              ->where('bln_thn',Input::get('bln_thn'))->whereIn('id_peserta',$peserta_id)->get();

				$mandiri = Iuran::where('id_bank','=','MDR')->where('status','=','LUNAS')
							  ->where('bln_thn',Input::get('bln_thn'))->whereIn('id_peserta',$peserta_id)->get();
				
				$temp = ["nama_pdam" => $value->nama_pdam,"bri_pay" => number_format($bri->sum('iuran'),2,',','.')
				         ,"bri_date" => date('d M Y',strtotime($bri->first()['tanggal_bayar'])),
						 "mandiri_pay" => number_format($mandiri->sum('iuran'),2,',','.'),
						 "mandiri_date" => date('d M Y',strtotime($mandiri->first()['tanggal_bayar']))];
				array_push($data,$temp);
				
				$bri_total = $bri_total + $bri->sum('iuran');
				$mandiri_total = $mandiri_total + $mandiri->sum('iuran');
			}
			
			return View::make('pht.laporan.rekeningkoran.list')->with('page','Lap.Rekening Koran')
				   ->with('modul','Index')->with('data',$data)->with('bln_thn',Input::get('bln_thn'))
				   ->with('bri_total',$bri_total)->with('mandiri_total',$mandiri_total)->with('no',1);
		}
	}
	
	public function rekapitulasikepesertaan()
	{
		return View::make('pht.laporan.rekapitulasikepesertaan.index')
		                 ->with('page','Rekapitulasi Kepesertaan')->with('modul','Index');
	}
	
	public function tampilrekapitulasikepesertaan()
	{
		$x = strval(substr(Input::get('tanggal'),0,2))-1;
		$lalu = strrev(substr(strrev('00'.$x.'-'.substr(Input::get('tanggal'),3,4)),0,7));	
		$data = [];
		$pdam = Pdam::All();
		foreach($pdam as $key => $value){
			$bulan_lalu = Peserta::where(DB::raw("substring(date_format(tanggal_masuk,'%d-%m-%Y'),4,7)"),'<',Input::get('tanggal'))
			           ->where('id_pdam','=',$value->id_pdam)->get();
			
			$bulan_ini = Peserta::where(DB::raw("substring(date_format(tanggal_masuk,'%d-%m-%Y'),4,7)"),'<=',Input::get('tanggal'))
			           ->where('id_pdam','=',$value->id_pdam)->get();
			
			$inc_peserta = $bulan_ini->count() - $bulan_lalu->count();
			
			//cari penambahan dan pengurangan jumlah iuran 
			$pdam = Pdam::find($value->id_pdam);
			$id_peserta = $pdam->peserta->lists('id_peserta','id_peserta');
			$iuran_blnini = Iuran::where('bln_thn','=',Input::get('tanggal'))
			                ->whereIn('id_peserta',$id_peserta)->sum('iuran');
			
			$iuran_blnlalu = Iuran::where('bln_thn','=',$lalu)
			                ->whereIn('id_peserta',$id_peserta)->sum('iuran');
			
			$inc_iuran = $iuran_blnini - $iuran_blnlalu;
			
			//pensiun normal
			$normal_saatini = Peserta::where('id_pdam','=',$value->id_pdam)
			                  ->where('id_status','=',1)->where
							  (DB::raw("substring(date_format(tanggal_berhenti,'%d-%m-%Y'),4,7)"),'=',Input::get('tanggal'))->count();
			
			$normal_sampaiini = Peserta::where('id_pdam','=',$value->id_pdam)
			                  ->where('id_status','=',1)->where
							  (DB::raw("substring(date_format(tanggal_berhenti,'%d-%m-%Y'),4,7)"),'>',Input::get('tanggal'))->count();
		
			
			$temp = ["nama_pdam"=>$value->nama_pdam,"bulan_lalu"=>$bulan_lalu->count(),
			         "bulan_ini"=>$bulan_ini->count(),"inc_peserta"=>$inc_peserta,
					 "inc_iuran"=>$bulan_lalu->first()->nama_paket,"inc_iuran"=>$inc_iuran,
					 "normal_saatini"=>$normal_saatini,"normal_sampaiini"=>$normal_sampaiini];
			array_push($data,$temp);
		}
		return View::make('pht.laporan.rekapitulasikepesertaan.list')->with('data',$data)->with('pdam',$pdam);
	}
	
	public function laporantunggakan()
	{
		$pdam = Pdam::Lists('nama_pdam','id_pdam');
		return View::make('pht.laporan.tunggakan.index')->with('pdam',$pdam)
						 ->with('page','Laporan Tunggakan')->with('modul','Index');
	}
	
	public function tampillaporantunggakan()
	{
		$rules = array(
			'bln_thn' => array('required','date_format:m-Y'),
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails())
		{
			return Redirect::to('laporantunggakan')->withErrors($validator)->withInput();
		}else{
			$pdam = Pdam::find(Input::get('id_pdam'));
			$id_peserta = $pdam->peserta()->lists('id_peserta','id_peserta');
			$iuran = Iuran::where('bln_thn',Input::get('bln_thn'))
		             ->where('status','TUNDA')->whereIn('id_peserta',$id_peserta)->get();
		}
		return View::make('pht.laporan.tunggakan.list')->with('iuran',$iuran);
	}
	
	public function laporankeuanganpht()
	{
		$pdam = Pdam::Lists('nama_pdam','id_pdam');
		$status = Status::Lists('keterangan','id_status');
		return View::make('pht.laporan.keuangan.index')->with('status',$status)
		       ->with('pdam',$pdam)->with('page','Lap.Peserta')->with('modul','Index');
	}
	
	public function tampillaporankeuanganpht()
	{
		$rules = array(
			'bln_thn' => array('required','date_format:m-Y'),
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails())
		{
			return Redirect::to('laporankeuanganpht')->withErrors($validator)->withInput();
		}else{
			return View::make('pht.laporan.keuangan.list')->with('bln_thn',Input::get('bln_thn'));
		}
	}


	

}
