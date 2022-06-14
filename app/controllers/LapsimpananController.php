<?php

class LapsimpananController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Pdam::lists('nama_pdam','id_pdam');
		return View::make('usp.laporan.simpanan.index')->with('data',$data)
		->with('page','Laporan Simpanan')->with('modul','Index');
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
		$tanggal = date('Y-m-d',strtotime(Input::get('tanggal_simpanan')));
		$data = Simpanan::where('tanggal_simpanan','<=',$tanggal)->get();
		
		return View::make('usp.laporan.simpanan.list')->with('data',$data)
		->with('page','Laporan Simpanan')->with('modul','Index');
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
