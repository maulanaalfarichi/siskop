<?php

class BayarpinjamanController extends \BaseController {

/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = DB::table('v_pinjaman')->paginate(5);
		return View::make('usp.bayarpinjaman.index')->with('data',$data)
		->with('page','Bayar Pinjaman')->with('modul','Index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
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
		return View::make('usp.bayarpinjaman.show')->with('data',$data)->with('detail',$detail)
		->with('page','Bayar Pinjaman')->with('modul','Show');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$bayar = Pinjamandetail::find($id);
		$bayar->tanggal_bayar = date('Y-m-d');
		$bayar->save();
		
		$data  = Pinjamanheader::find($bayar->id_pinjam);
		$detail = Pinjamandetail::where('id_pinjam','=',$bayar->id_pinjam)->get();
		return View::make('usp.bayarpinjaman.show')->with('data',$data)->with('detail',$detail)
		->with('page','Bayar Pinjaman')->with('modul','Show');
		Session::flash('message','Successfully update a Tanggal Bayar');
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
		
	}
	
	
}
