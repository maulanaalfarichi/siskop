<?php

class NeracaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('accounting.laporan.neraca.index')
			->with('page','Neraca')->with('modul','Index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$profil = Accprofil::All();
		$tanggal = date('Y-m-d',strtotime(Input::get('tanggal')));
		//$tahun = 'v_neraca_'.date('Y',strtotime(Input::get('tanggal')));
		//$data = DB::table($tahun);
		$data = DB::table('v_neraca_fix')->where('tahun','=',date('Y',strtotime(Input::get('tanggal'))))
							->where('bln','=',date('m',strtotime(Input::get('tanggal'))))->get();
		return View::make('accounting.laporan.neraca.list')->with('data',$data)
			->with('tanggal',$tanggal)->with('profil',$profil)
			->with('page','Neraca')->with('modul','Index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
