<?php

class SimpananController extends \BaseController {

/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Datatable::shouldHandle())
		{
			return Datatable::collection(Vsimpanan::all(array('id','tanggal_simpanan','id_koperasi','nama_koperasi','jenis_simpanan','jumlah')))
					->showColumns('id','tanggal_simpanan','id_koperasi','nama_koperasi','jenis_simpanan','jumlah')
					->addColumn('',function($model){
						return '<a href="simpanan/'.$model->id.'"  class="btn btn-success btn-sm"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Show</a> 
								<a href="simpanan/'.$model->id.'/edit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a> 
						        <form  method="post" action="simpanan/'.$model->id.'" class="pull-right" >
								<input type="hidden" name="_method" value="DELETE">								
								<button id="delete_row" type="submit" class="btn btn-warning btn-sm " ><span class=glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</button>
								</form>';
					})
					->searchColumns('id','tanggal_simpanan','id_koperasi','nama_koperasi','jenis_simpanan','jumlah')
					->orderColumns('id','tanggal_simpanan','id_koperasi','nama_koperasi','jenis_simpanan','jumlah')
					->make();
		}
		return View::make('usp.simpanan.index')->withTitle('Simpanan');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$data = Jenissimpan::lists('jenis_simpanan','id');
		return View::make('usp.simpanan.create')->with('data',$data)
		->with('page','Simpanan')->with('modul','Create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'id_anggota' => 'required',
			'id_jenis' => 'required',
			'jumlah' => 'required|numeric'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('simpanan/create')->withErrors($validator)->withInput();
		}else{
			$data = new Simpanan();
			$data->id = $this->nomor();
			$data->tanggal_simpanan = date('Y-m-d');
			$data->id_anggota = Input::get('id_anggota');
			$data->id_jenis = Input::get('id_jenis');
			$data->jumlah = Input::get('jumlah');
			$data->save();
			
			Session::flash('message',$this->nomor().' - Successfully created a Simpanan');
			return Redirect::to('simpanan')
			->with('page','Simpanan')->with('modul','Index');
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
		$data  = Vsimpanan::find($id);
		return View::make('usp.simpanan.show')->with('data',$data)
		->with('page','Simpanan')->with('modul','Show');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = Koperasi::find($id);
		return View::make('usp.koperasi.edit')->with('data',$data)
		->with('page','Koperasi')->with('modul','Edit');
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
			'nama_koperasi' =>'required',
			'alamat' => 'required',
			'telp' => 'required',
			'fax' => 'required',
			'pengurus1' => 'required',
			'pengurus2' => 'required',
			'pengurus3' => 'required',
			'pengawas' => 'required',
			'email' => 'required',
			'simpanan_pokok' => 'required',
			'simpanan_wajib' => 'required'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('koperasi/'.$id.'/edit')->withErrors($validator)->withInput();
		}else{
			$data = Koperasi::find($id);
			$data->nama_koperasi = Input::get('nama_koperasi');
			$data->alamat = Input::get('alamat');
			$data->telp = Input::get('telp');
			$data->fax = Input::get('fax');
			$data->pengurus1 = Input::get('pengurus1');
			$data->pengurus2 = Input::get('pengurus2');
			$data->pengurus3 = Input::get('pengurus3');
			$data->pengawas = Input::get('pengawas');
			$data->email = Input::get('email');
			$data->simpanan_pokok = Input::get('simpanan_pokok');
			$data->simpanan_wajib = Input::get('simpanan_wajib');
			$data->save();
			
			Session::flash('message','Successfully update a Koperasi');
			return Redirect::to('koperasi')->with('page','Koperasi')->with('modul','Index');
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
		$data = Simpanan::find($id);
		$data->delete();
		
		Session::flash('message','Successfully deleted Simpanan');
		return Redirect::to('simpanan')->with('page','Simpanan')->with('modul','Index');
	}
	
	public function nomor(){
		$tanggal = date('d-m-Y');
		$tahun = substr($tanggal,6,4);
		$bulan = substr($tanggal,3,2);
		
		$simpanan = DB::table('usp_simpanans')->select('id')->where(DB::raw('substring(id,1,4)'),$tahun)
		                                ->where(DB::raw('substring(id,5,2)'),$bulan)
										->orderBy('id','desc')->first();
		
		if(empty($simpanan)){
			$nomor = strval($tahun).strval($bulan).strval('0001');	 
		}else{
			$nomor = $simpanan->id+1;
		}
		
		return $nomor;
	}


}
