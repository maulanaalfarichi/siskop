<?php

class BukujurnalController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('accounting.laporan.bukujurnal.index')
			->with('page','Buku Jurnal')->with('modul','Index');
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
		$tgl_awal = date('Y-m-d',strtotime(Input::get('tgl_awal')));
		$tgl_akhir = date('Y-m-d',strtotime(Input::get('tgl_akhir')));
		
		$data = DB::table('v_buku_journal')->whereBetween('tanggal',array($tgl_awal,$tgl_akhir),'and',$not = true);
		return View::make('accounting.laporan.bukujurnal.list')->with('data',$data)
			->with('page','Buku Jurnal')->with('modul','Index');
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
