<?php

class PengambilanController extends \BaseController {

/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Pengambilan::paginate(5);
		return View::make('usp.pengambilan.index')->with('data',$data)
		->with('page','Pengambilan')->with('modul','Index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('usp.pengambilan.create')
		->with('page','pengambilan')->with('modul','Create');
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
			'jumlah' => 'required|numeric'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('pengambilan/create')->withErrors($validator)->withInput();
		}else{
			//cek dulu apakah simpanan anggota ini masih ada atau tidak
			$sisa = $this->sisa_simpanan(Input::get('id_anggota'));
			if($sisa < Input::get('jumlah'))
			{
				Session::flash('message','Simpanan anda tidak mencukupi');
				return Redirect::to('pengambilan/create')->withErrors($validator)->withInput();
			}else{
				$nomor = $this->nomor();
				$data = new Pengambilan();
				$data->id = $nomor;
				$data->tanggal_ambil = date('Y-m-d');
				$data->id_anggota = Input::get('id_anggota');
				$data->jumlah = Input::get('jumlah');
				$data->save();
				
				Session::flash('message',$nomor.' - Successfully created a Pengambilan');
				return Redirect::to('pengambilan')
				->with('page','Pengambilan')->with('modul','Index');
			}
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
		$data  = Pengambilan::find($id);
		return View::make('usp.pengambilan.show')->with('data',$data)
		->with('page','Pengambilan')->with('modul','Show');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = Pengambilan::find($id);
		return View::make('usp.pengambilan.edit')->with('data',$data)
		->with('page','Pengambilan')->with('modul','Edit');
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			'id_anggota' => 'required|max:10',
			'jumlah' => 'required|numeric'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('pengambilan/'.$id.'/edit')->withErrors($validator)->withInput();
		}else{
			//cek dulu apakah simpanan anggota ini masih ada atau tidak
			$pengambilan = Pengambilan::find($id);
			$sisa = $this->sisa_simpanan(Input::get('id_anggota')) + $pengambilan['jumlah'];
			if($sisa < Input::get('jumlah'))
			{
				Session::flash('message','Simpanan anda tidak mencukupi');
				return Redirect::to('pengambilan/'.$id.'/edit')->withErrors($validator)->withInput();
			}else{
				$data = Pengambilan::find($id);
				$data->id_anggota = Input::get('id_anggota');
				$data->jumlah = Input::get('jumlah');
				$data->save();
				
				Session::flash('message','Successfully updated a Pengambilan');
				return Redirect::to('pengambilan')
				->with('page','Pengambilan')->with('modul','Index');
			}
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$data = Pengambilan::find($id);
		$data->delete();
		
		Session::flash('message','Successfully deleted Pengambilan');
		return Redirect::to('pengambilan')->with('page','Pengambilan')->with('modul','Index');
	}
	
	public function nomor(){
		$tanggal = date('d-m-Y');
		$tahun = substr($tanggal,6,4);
		$bulan = substr($tanggal,3,2);
		
		$pengambilan = DB::table('usp_pengambilan')->select('id')->where(DB::raw('substring(id,1,4)'),$tahun)
		                                ->where(DB::raw('substring(id,5,2)'),$bulan)
										->orderBy('id','desc')->first();
		
		if(empty($pengambilan)){
			$nomor = strval($tahun).strval($bulan).strval('0001');	 
		}else{
			$nomor = $pengambilan->id+1;
		}
		
		return $nomor;
	}
	
	public function sisa_simpanan($id){
		$simpanan = Simpanan::where('id_anggota','=',$id)->get();
		$pengambilan = Pengambilan::where('id_anggota','=',$id)->get();
		$sisa = $simpanan->sum('jumlah') - $pengambilan->sum('jumlah');
		return $sisa;			
	}


}
