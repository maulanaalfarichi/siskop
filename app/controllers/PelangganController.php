<?php

class PelangganController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Pelanggan::paginate(5);
		return View::make('trading.pelanggan.index')->with('data',$data)
		->with('page','Pelanggan')->with('modul','Index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('trading.pelanggan.create')->with('page','Pelanggan')->with('modul','Create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'nama_pelanggan' => 'required',
			'alamat' =>'required',
			'contact' =>'required',
			'telp' =>'required',
			'fax' =>'required'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('pelanggan/create')->withErrors($validator)->withInput();
		}else{
			$data = new Pelanggan();
			$data->nama_pelanggan = Input::get('nama_pelanggan');
			$data->alamat = Input::get('alamat');
			$data->contact = Input::get('contact');
			$data->telp = Input::get('telp');
			$data->fax = Input::get('fax');
			$data->save();
			
			Session::flash('message','Successfully created a Pelanggan');
			return Redirect::to('pelanggan')->with('page','Pelanggan')->with('modul','Index');
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
		$data = Pelanggan::find($id);
		return View::make('trading.pelanggan.show')->with('data',$data)
		->with('page','Pelanggan')->with('modul','Show');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = Pelanggan::find($id);
		return View::make('trading.pelanggan.edit')->with('data',$data)
		->with('page','pelanggan')->with('modul','Show');
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
			'nama_pelanggan' => 'required',
			'alamat' =>'required',
			'contact' =>'required',
			'telp' =>'required',
			'fax' =>'required'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('pelanggan/'.$id.'/edit')->withErrors($validator)->withInput();
		}else{
			$data = Pelanggan::find($id);
			$data->nama_pelanggan = Input::get('nama_pelanggan');
			$data->alamat = Input::get('alamat');
			$data->contact = Input::get('contact');
			$data->telp = Input::get('telp');
			$data->fax = Input::get('fax');
			$data->save();
			
			Session::flash('message','Successfully update a Pelanggan');
			return Redirect::to('pelanggan')->with('page','Pelanggan')->with('modul','Index');
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
		$data = Pelanggan::find($id);
		$data->delete();
		
		Session::flash('message','Successfully deleted Pelanggan');
		return Redirect::to('pelanggan')->with('page','Pelanggan')->with('modul','Index');
	}


}
