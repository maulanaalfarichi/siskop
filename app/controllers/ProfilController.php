<?php

class ProfilController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$profil = Accprofil::paginate(5);
		return View::make('accounting.profil.index')->with('profil',$profil)->with('page','Profil')->with('modul','Index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('accounting.profil.create')->with('page','Profil')->with('modul','Create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'nama_perusahaan' =>'required|max:100',
			'alamat' => 'required',
			'telpon' => 'required',
			'fax' =>'required',
			'email' => 'required',
			'website' => 'required',
			'ketua' => 'required',
			'manager' => 'required'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('profil/create')->withErrors($validator)->withInput();
		}else{
			$profil = new Accprofil();
			$profil->nama_perusahaan = Input::get('nama_perusahaan');
			$profil->alamat = Input::get('alamat');
			$profil->telpon = Input::get('telpon');
			$profil->fax = Input::get('fax');
			$profil->email = Input::get('email');
			$profil->website = Input::get('website');
			$profil->ketua = Input::get('ketua');
			$profil->manager = Input::get('manager');
			$profil->save();
			
			
			Session::flash('message','Successfully created a Profil');
			return Redirect::to('profil')->with('page','Profil')->with('modul','Index');
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
		$profil = Accprofil::find($id);
		return View::make('accounting.profil.show')->with('profil',$profil)->with('page','Profil')->with('modul','Show');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$profil = Accprofil::find($id);
		return View::make('accounting.profil.edit')->with('profil',$profil)->with('page','Profil')->with('modul','Edit');
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
			'nama_perusahaan' =>'required|max:100',
			'alamat' => 'required',
			'telpon' => 'required',
			'fax' =>'required',
			'email' => 'required',
			'website' => 'required',
			'ketua' => 'required',
			'manager' => 'required'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('profil/'.$id.'/edit')->withErrors($validator);
		}else{
			$profil = Accprofil::find($id);
			$profil->nama_perusahaan = Input::get('nama_perusahaan');
			$profil->alamat = Input::get('alamat');
			$profil->telpon = Input::get('telpon');
			$profil->fax = Input::get('fax');
			$profil->email = Input::get('email');
			$profil->website = Input::get('website');
			$profil->ketua = Input::get('ketua');
			$profil->manager = Input::get('manager');
			$profil->save();
			
			Session::flash('message','Successfully update a Profil');
			return Redirect::to('profil')->with('page','Profil')->with('modul','Index');;
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
		$profil = Accprofil::find($id);
		$profil->delete();
		
		Session::flash('message','Successfully deleted Profil');
		return Redirect::to('profil')->with('page','Profil')->with('modul','Index');
	}


}
