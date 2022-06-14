<?php

class PinjamanheaderController extends \BaseController {

/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Pinjamanheader::paginate(5);
		return View::make('usp.pinjamanheader.index')->with('data',$data)
		->with('page','Pinjaman Header')->with('modul','Index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('usp.pinjamanheader.create')
		->with('page','Pinjaman')->with('modul','Create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'id_anggota' => 'required|max:10',
			'pokok_pembiayaan' => 'required|numeric',
			'perkiraan_nisbah' => 'required|numeric',
			'maksimum_pembiayaan' => 'required|numeric',
			'jangka_waktu' => 'required|numeric',
			'keterangan' => 'required'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('pinjamanheader/create')->withErrors($validator)->withInput();
		}else{
			$nomor = $this->nomor();
			$data = new Pinjamanheader();
			$data->id = $nomor;
			$data->tanggal_pinjam = date('Y-m-d');
			$data->id_anggota = Input::get('id_anggota');
			$data->pokok_pembiayaan = Input::get('pokok_pembiayaan');
			$data->perkiraan_nisbah = Input::get('perkiraan_nisbah');
			$data->maksimum_pembiayaan = Input::get('maksimum_pembiayaan');
			$data->jangka_waktu = Input::get('jangka_waktu');
			$data->keterangan = Input::get('keterangan');
			$data->save();
			
			if($data){
				$this->input_detail($nomor,Input::get('jangka_waktu'),Input::get('pokok_pembiayaan'),Input::get('perkiraan_nisbah'));
			}
			
			Session::flash('message',$nomor.' - Successfully created a Pinjaman');
			return Redirect::to('pinjamanheader')
			->with('page','pinjamanheader')->with('modul','Index');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$data  = Pinjamanheader::find($id);
		$detail = Pinjamandetail::where('id_pinjam','=',$id)->get();
		return View::make('usp.pinjamanheader.show')->with('data',$data)->with('detail',$detail)
		->with('page','Pinjaman')->with('modul','Show');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//tidak ada untuk event ini 
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//tidak ada event ini
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$data = Pinjamanheader::find($id);
		$data->delete();
		
		
		$detail = Pinjamandetail::where('id_pinjam','=',$id);
		$detail->delete();
		
		Session::flash('message','Successfully deleted Pinjaman');
		return Redirect::to('pinjamanheader')->with('page','Pinjaman')->with('modul','Index');
	}
	
	public function nomor()
	{
		$tanggal = date('d-m-Y');
		$tahun = substr($tanggal,6,4);
		$bulan = substr($tanggal,3,2);
		
		$data = DB::table('usp_pinjaman_header')->select('id')->where(DB::raw('substring(id,1,4)'),$tahun)
		        ->where(DB::raw('substring(id,5,2)'),$bulan)
				->orderBy('id','desc')->first();
		
		if(empty($data)){
			$nomor = strval($tahun).strval($bulan).strval('0001');	 
		}else{
			$nomor = $data->id+1;
		}
		
		return $nomor;
	}
	
	public function input_detail($nomor,$jangka,$pokok,$bagihasil)
	{
		
		$jml_ang = 0;
		$ang_pokok = $pokok / $jangka;
		$ang_bagihasil = $bagihasil / $jangka;
		$total_angsuran = $ang_pokok + $ang_bagihasil; 
		$max_pembiayaan = $pokok + $bagihasil;
		for($i=1;$i<=$jangka;$i++)
		{
			$jml_ang = $jml_ang + $total_angsuran;
			$sisa_pembiayaan = $max_pembiayaan - $jml_ang; 
			$data = new Pinjamandetail();
			$data->id_pinjam = $nomor;
			$data->cicilan_ke = $i;
			$data->angsuran_pokok = $ang_pokok;
			$data->perkiraan_bagi_hasil = $ang_bagihasil;
			$data->total_angsuran = $total_angsuran;
			$data->sisa_pembiayaan = $sisa_pembiayaan;
			$data->save();
		}
	}
}
