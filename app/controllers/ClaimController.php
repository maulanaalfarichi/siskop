<?php

class ClaimController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$claim = Claim::paginate(5);
		return View::make('pht.claim.index')->with('claim',$claim)->with('page','Claim')->with('modul','Index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$peserta = Peserta::Lists('nama_peserta','id_peserta');
		$status = Status::Lists('keterangan','id_status');
		$bank = Bank::Lists('nama_bank','id_bank');
		return View::make('pht.claim.create')->with('page','Claim')->with('modul','Create')->with('peserta',$peserta)
					->with('status',$status)->with('bank',$bank);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'nama_lengkap' =>'required|max:60',
			'tempat_lahir' =>'required|max:60',
			'tanggal_lahir' => array('required','date_format:d-m-Y'),
			'alamat_rumah' =>'required|max:255',
			'hubungan' =>'required|max:20',
			'jenis_pengajuan' =>'required|max:30',
			'id_peserta' =>'required',
			'id_status' =>'required|max:2',
			'id_bank' =>'required|max:3',
			'cabang' =>'required|max:60',
			'nama_rekening' =>'required|max:60',
			'no_rekening' =>'required|numeric'
		);
		
		$peserta = Peserta::find(Input::get('id_peserta'));
		if ($peserta->jml_claim >=2)
		{
			Session::flash('message','Claim request maximum = 2 !!');
			return Redirect::to('claim')->with('page','Claim')->with('modul','Index')->withInput();
		}else{
			$validator = Validator::make(Input::all(),$rules);
			if($validator->fails()){
				return Redirect::to('claim/create')->withErrors($validator)->withInput();
			}else{
				$claim = new Claim();
				$claim->id_claim = $this->nomor();
				$claim->nama_lengkap = Input::get('nama_lengkap');
				$claim->tempat_lahir = Input::get('tempat_lahir');
				$claim->alamat_rumah = Input::get('alamat_rumah');
				$claim->hubungan = Input::get('hubungan');
				$claim->jenis_pengajuan = Input::get('jenis_pengajuan');
				$claim->id_peserta = Input::get('id_peserta');
				$claim->id_status = Input::get('id_status');
				$claim->keterangan = Input::get('keterangan');
				$claim->id_bank = Input::get('id_bank');
				$claim->cabang = Input::get('cabang');
				$claim->nama_rekening = Input::get('nama_rekening');
				$claim->no_rekening = Input::get('no_rekening');
				$claim->save();
				
				$peserta = Peserta::find(Input::get('id_peserta'));
				$peserta->jml_claim = $peserta->jml_claim + 1;
				$peserta->save();
				
				Session::flash('message',$this->nomor().'Successfully created a Claim');
				return Redirect::to('claim')->with('page','Claim')->with('modul','Index');
			}
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id_claim)
	{
		$claim = Claim::find($id_claim);
		return View::make('pht.claim.show')->with('claim',$claim)->with('page','Claim')->with('modul','Show');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id_claim)
	{
		$claim = Claim::find($id_claim);
		$peserta = Peserta::Lists('nama_peserta','id_peserta');
		$status = Status::Lists('keterangan','id_status');
		$bank = Bank::Lists('nama_bank','id_bank'); 
		return View::make('pht.claim.edit')->with('claim',$claim)->with('page','Claim')->with('modul','Edit')
		        ->with('peserta',$peserta)->with('status',$status)->with('bank',$bank);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id_claim)
	{
		$rules = array(
			'nama_lengkap' =>'required|max:60',
			'tempat_lahir' =>'required|max:60',
			'tanggal_lahir' => array('required','date_format:d-m-Y'),
			'alamat_rumah' =>'required|max:255',
			'hubungan' =>'required|max:20',
			'jenis_pengajuan' =>'required|max:30',
			'id_peserta' =>'required',
			'id_status' =>'required|max:2',
			'id_bank' =>'required|max:3',
			'cabang' =>'required|max:60',
			'nama_rekening' =>'required|max:60',
			'no_rekening' =>'required|numeric'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('claim/'.$id_claim.'/edit')->withErrors($validator);
		}else{
			$claim = Claim::find($id_claim);
			$claim->nama_lengkap = Input::get('nama_lengkap');
			$claim->tempat_lahir = Input::get('tempat_lahir');
			$claim->alamat_rumah = Input::get('alamat_rumah');
			$claim->hubungan = Input::get('hubungan');
			$claim->jenis_pengajuan = Input::get('jenis_pengajuan');
			$claim->id_peserta = Input::get('id_peserta');
			$claim->id_status = Input::get('id_status');
			$claim->keterangan = Input::get('keterangan');
			$claim->id_bank = Input::get('id_bank');
			$claim->cabang = Input::get('cabang');
			$claim->nama_rekening = Input::get('nama_rekening');
			$claim->no_rekening = Input::get('no_rekening');
			$claim->save();
			
			Session::flash('message','Successfully update a Claim');
			return Redirect::to('claim')->with('page','Claim')->with('modul','Index');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id_claim)
	{
		$claim = Claim::find($id_claim);
		$claim->delete();

		$peserta = Peserta::find($claim->id_peserta);
		$peserta->jml_claim = $peserta->jml_claim - 1;
		$peserta->save();
		
		Session::flash('message','Successfully deleted Claim');
		return Redirect::to('claim')->with('page','Claim')->with('modul','Index');
	}
	
	public function nomor()
	{
		$tahun = date('Y');
		$bulan = date('m');
		
		$claim = DB::table('claims')->select('id_claim')->where(DB::raw('substring(id_claim,1,4)'),$tahun)
		                                ->where(DB::raw('substring(id_claim,5,2)'),$bulan)
										->orderBy('id_claim','desc')->first();
		
		if(empty($claim)){
			$nomor = strval($tahun).strval($bulan).strval('0001');	 
		}else{
			$nomor = $claim->id_claim + 1;
		}
		
		return $nomor;
	}
	
	public function panduanclaim()
	{
		return View::make('pht.claim.panduan')->with('page','Claim')->with('modul','Panduan');
	}


}
