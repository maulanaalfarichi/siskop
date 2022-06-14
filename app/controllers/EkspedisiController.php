<?php

class EkspedisiController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$ekspedisi = Ekspedisi::paginate(5);
		return View::make('trading.ekspedisi.index')->with('ekspedisi',$ekspedisi);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('trading.ekspedisi.create')->with('page','Ekspedisi')->with('modul','Create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'nama' => 'required',
			'alamat' =>'required',
			'kota' =>'required',
			'contact' =>'required',
			'telp' =>'required',
			'daerah' =>'required',
			'email' =>'required'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('ekspedisi/create')->withErrors($validator)->withInput();
		}else{
			$ekspedisi = new Ekspedisi();
			$ekspedisi->nama = Input::get('nama');
			$ekspedisi->alamat = Input::get('alamat');
			$ekspedisi->kota = Input::get('kota');
			$ekspedisi->contact = Input::get('contact');
			$ekspedisi->telp = Input::get('telp');
			$ekspedisi->daerah = Input::get('daerah');
			$ekspedisi->email = Input::get('email');
			$ekspedisi->save();
			
			Session::flash('message','Successfully created a Ekspedisi');
			return Redirect::to('ekspedisi')->with('page','Ekpedisi')->with('modul','Index');
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
		$ekspedisi = Ekspedisi::find($id);
		return View::make('trading.ekspedisi.show')->with('ekspedisi',$ekspedisi)
		       ->with('page','Ekspedisi')->with('modul','Show');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$ekspedisi = Ekspedisi::find($id);
		return View::make('trading.ekspedisi.edit')->with('ekspedisi',$ekspedisi)
		->with('page','Ekspedisi')->with('modul','Show');
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
			'nama' => 'required',
			'alamat' =>'required',
			'kota' =>'required',
			'contact' =>'required',
			'telp' =>'required',
			'daerah' =>'required',
			'email' =>'required'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('ekspedisi/edit')->withErrors($validator)->withInput();
		}else{
			$ekspedisi = Ekspedisi::find($id);
			$ekspedisi->nama = Input::get('nama');
			$ekspedisi->alamat = Input::get('alamat');
			$ekspedisi->kota = Input::get('kota');
			$ekspedisi->contact = Input::get('contact');
			$ekspedisi->telp = Input::get('telp');
			$ekspedisi->daerah = Input::get('daerah');
			$ekspedisi->email = Input::get('email');
			$ekspedisi->save();
			
			Session::flash('message','Successfully updated a Ekspedisi');
			return Redirect::to('ekspedisi')->with('page','Ekpedisi')->with('modul','Index');
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
		$ekspedisi = Ekspedisi::find($id);
		$ekspedisi->delete();
		
		Session::flash('message','Successfully deleted Ekspedisi');
		return Redirect::to('ekspedisi')->with('page','Ekspedisi')->with('modul','Index');
	}


}
